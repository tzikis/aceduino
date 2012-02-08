<?php

namespace Ace\EditorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    public $default_file = "default_text.txt";
    public function indexAction($name)
    {
		if($name == "tzikis")
			return $this->redirect($this->generateUrl('AceEditorBundle_list', array('name' => $name)));
			
        return $this->render('AceEditorBundle:Default:index.html.twig', array('name' => $name));
    }

    public function listAction($name)
    {
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
        return $this->render('AceEditorBundle:Default:editor.html.twig', array('code' => $value));
    }
}
