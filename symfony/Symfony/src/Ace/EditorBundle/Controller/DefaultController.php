<?php

namespace Ace\EditorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;


class DefaultController extends Controller
{
    public $default_file = "default_text.txt";
    public function indexAction()
    {
		// if($name == "tzikis")
		// 	return $this->redirect($this->generateUrl('AceEditorBundle_list', array('name' => $name)));
		// 	
		        return $this->render('AceEditorBundle:Default:index.html.twig');
    }

    public function listAction()
    {
		$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
		$session  = $this->get("session");
	    $product = $this->getDoctrine()
	        ->getRepository('AceEditorBundle:EditorUser')
	        ->findOneByUsername($name);

	    if (!$product) {
	        throw $this->createNotFoundException('No product found for id '.$name);
	    }
		$files = $this->getDoctrine()->getRepository('AceEditorBundle:EditorFile')->findByOwner($product->getId());
	    // do something, like pass the $product object into a template
		$fullname= $product->getFirstname()." (".$product->getUsername().") ".$product->getLastname();
		        
		return $this->render('AceEditorBundle:Default:list.html.twig', array('name' =>$fullname, 'files' => $files));
    }

    public function editAction($filename)
    {
		$directory = "/var/www/aceduino/symfony/files/";
		if(!file_exists($directory.$filename))
			$filename = $this->default_file;
			
		// $filename = getcwd();
		
		$file = fopen($directory.$filename, 'r');
		$value = fread($file, filesize($directory.$filename));
		fclose($file);		
        return $this->render('AceEditorBundle:Default:editor.html.twig', array('code' => $value, 'filename' => $filename));
    }

    public function saveAction($filename)
    {
		$response = new Response('404 Not Found!', 404, array('content-type' => 'text/plain'));
	    if ($this->getRequest()->getMethod() === 'POST')
		{
			$mydata = $this->getRequest()->request->get('data');
			if($mydata)
			{
				$directory = "/var/www/aceduino/symfony/files/";
				if(file_exists($directory.$filename))
				{
					$file = fopen($directory.$filename, 'w');
					fwrite($file, $mydata);
					fclose($file);
				}
				// return new Response($mydata);
				$response->setContent("OK");
				$response->setStatusCode(200);
				$response->headers->set('Content-Type', 'text/html');
			}
		}
		return $response;
    }

}
