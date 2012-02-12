<?php

namespace Ace\EditorBundle\Controller;

require_once 'File/Find.php';
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;
use PEAR2\File;

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
		$examples_directory = "/var/www/aceduino/symfony/examples/";
		
		$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
		$user = $this->getDoctrine()->getRepository('AceEditorBundle:EditorUser')->findOneByUsername($name);
		$file = $this->getDoctrine()->getRepository('AceEditorBundle:EditorFile')->findOneByFilename($filename);
		
		if(!$user)
		{
	        throw $this->createNotFoundException('No user found for username '.$name);
		}
		else if(!$file)
		{
	        throw $this->createNotFoundException('No file found for filename '.$filename);			
		}
		
		if($user->getId() != $file->getOwner())
		{
			return $this->redirect($this->generateUrl('AceEditorBundle_list'));
		}
			
		if(!file_exists($directory.$filename))
			$filename = $this->default_file;
			
		// $filename = getcwd();
		$examples = $this->iterate_dir($examples_directory);
		for($i = 0; $i < count($examples); $i++ )
		{
			$array = $this->iterate_dir($examples_directory.$examples[$i]);
			$examples[$i] = array($examples[$i], $array);
		}
				
		$file = fopen($directory.$filename, 'r');
		$value = fread($file, filesize($directory.$filename));
		fclose($file);
        return $this->render('AceEditorBundle:Default:editor.html.twig', array('code' => $value, 'filename' => $filename, 'examples' => $examples));
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

	private function iterate_dir($directory)
	{
		$dir = opendir($directory);
		$iter = readdir();
		$array = array();
		while(!($iter === FALSE))
		{
			$array[] = $iter;
			// echo $dir."<br />";
			$iter = readdir();
		}
		for($i = 0; $i <= count($array); $i++ )
		{
			if($array[$i] == "." || $array[$i] == "..")
				unset($array[$i]);
		}

		sort($array);
		closedir($dir);
		return $array;
	}
	
	public function optionsAction()
    {
		$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
	    $product = $this->getDoctrine()->getRepository('AceEditorBundle:EditorUser')->findOneByUsername($name);

	    if (!$product) {
	        throw $this->createNotFoundException('No product found for id '.$name);
	    }
		//$files = $this->getDoctrine()->getRepository('AceEditorBundle:EditorFile')->findByOwner($product->getId());
	    // do something, like pass the $product object into a template
		//$fullname= $product->getFirstname()." (".$product->getUsername().") ".$product->getLastname();
		        
		return $this->render('AceEditorBundle:Default:options.html.twig');//, array('name' =>$fullname, 'files' => $files));
    }
}
