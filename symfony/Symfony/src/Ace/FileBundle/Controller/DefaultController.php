<?php

namespace Ace\FileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ace\FileBundle\Document\File;

class DefaultController extends Controller
{
    public $default_file = "default_text.txt";
	public $directory = "/var/www/aceduino/symfony/files/";
	public $examples_directory = "/var/www/aceduino/symfony/examples/";
	public $libs_directory = "/var/www/aceduino/symfony/libraries/";

	public function createAction()
	{
	    if ($this->getRequest()->getMethod() === 'POST')
		{
			$project_name = $this->getRequest()->request->get('project_name');
			if($project_name == '')
			{
				return $this->redirect($this->generateUrl('AceEditorBundle_list'));
			}
			
			$file = $this->getProject($project_name, $error);
			if($error == -2)
			{
				$file = fopen($this->directory.$this->default_file, 'r');
				$value = fread($file, filesize($this->directory.$this->default_file));
				fclose($file);

				$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
				$user = $this->getDoctrine()->getRepository('AceExperimentalUserBundle:ExperimentalUser')->findOneByUsername($name);
				
				$file = new File();
			    $file->setName($project_name);
			    $file->setCode($value);
				$timestamp = new \DateTime;
				$file->setCodeTimestamp($timestamp);
				$file->setHex("");
				$timestamp2 = new \DateTime;
				$interval = new \DateInterval('PT5M');
				$timestamp2->sub($interval);
				$file->setHexTimestamp($timestamp2);
			    $file->setOwner($user->getId());
				$file->setIsPublic(1);
				$file->setSchematic("");
				$file->setImage("");

			    $dm = $this->get('doctrine.odm.mongodb.document_manager');
			    $dm->persist($file);
			    $dm->flush();

				return $this->redirect($this->generateUrl('AceEditorBundle_editor',array('project_name' => $project_name)));
				
			}
			else if($error==-1)
			{
		        throw $this->createNotFoundException('No user found with username '.$name);				
			}
			else if($error == 0)
			{
				return $this->redirect($this->generateUrl('AceEditorBundle_list'));
			}
		}
		else
	        throw $this->createNotFoundException('No POST data!');		
	}
	
	public function getTimestampAction($project_name, $type)
	{
		$response = new Response('404 Not Found!', 404, array('content-type' => 'text/plain'));
		$file = $this->getProject($project_name, $error);
		if($type == "code" || $type == "hex")
		{
			if($type == "code")
				$response->setContent($file->getCodeTimestamp()->getTimestamp());
			else
				$response->setContent($file->getHexTimestamp()->getTimestamp());
			$response->setStatusCode(200);
			$response->headers->set('Content-Type', 'text/html');
		}
		return $response;
	}

	public function getCodeAction($project_name)
	{
		$file = $this->getProject($project_name, $error);
		if(!$error)
			return new Response($file->getCode());
		else
			return new Response("");
	}
	
	public function saveCodeAction()
    {
		$response = new Response('404 Not Found!', 404, array('content-type' => 'text/plain'));
	    if ($this->getRequest()->getMethod() === 'POST')
    	{
			$project_name = $this->getRequest()->request->get('project_name');
			$mydata = $this->getRequest()->request->get('data');
			if($project_name && $mydata)
			{
				$file = $this->getProject($project_name, $error);
				if(!$error)
				{
					$file->setCode($mydata);
					$timestamp = new \DateTime;
					$file->setCodeTimestamp($timestamp);
				    $dm = $this->get('doctrine.odm.mongodb.document_manager');
				    $dm->persist($file);
				    $dm->flush();					
					$response->setContent("OK");
					$response->setStatusCode(200);
					$response->headers->set('Content-Type', 'text/html');
				}
			}
		}
		return $response;
    }	
	public function getHexAction($project_name)
	{
		$file = $this->getProject($project_name, $error);
		if(!$error)
			return new Response($file->getHex());
		else
			return new Response("");
	}
	
	// public function saveHexAction()
	//     {
	// 	$response = new Response('404 Not Found!', 404, array('content-type' => 'text/plain'));
	//     if ($this->getRequest()->getMethod() === 'POST')
	//     	{
	// 		$project_name = $this->getRequest()->request->get('project_name');
	// 		$mydata = $this->getRequest()->request->get('data');
	// 		if($project_name && $mydata)
	// 		{
	// 			$file = $this->getProject($project_name, $error);
	// 			if(!$error)
	// 			{
	// 				$file->setHex($mydata);
	// 				$timestamp = new \DateTime;
	// 				$file->setHexTimestamp($timestamp);
	// 			    $dm = $this->get('doctrine.odm.mongodb.document_manager');
	// 			    $dm->persist($file);
	// 			    $dm->flush();					
	// 				$response->setContent("OK");
	// 				$response->setStatusCode(200);
	// 				$response->headers->set('Content-Type', 'text/html');
	// 			}
	// 		}
	// 	}
	// 	return $response;
	//     }	
	public function saveHexAction($project_name, $data)
    {
		$response = new Response('404 Not Found!', 404, array('content-type' => 'text/plain'));
		$file = $this->getProject($project_name, $error);
		if(!$error)
		{
			$file->setHex($data);
			$timestamp = new \DateTime;
			$file->setHexTimestamp($timestamp);
		    $dm = $this->get('doctrine.odm.mongodb.document_manager');
		    $dm->persist($file);
		    $dm->flush();					
			$response->setContent("OK");
			$response->setStatusCode(200);
			$response->headers->set('Content-Type', 'text/html');
		}
		return $response;
    }	

	private function getProject($project_name, &$error)
	{
		$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
		$user = $this->getDoctrine()->getRepository('AceExperimentalUserBundle:ExperimentalUser')->findOneByUsername($name);
		
		if(!$user)
		{
			$error = -1;			
		}
		
		$file = $this->get('doctrine.odm.mongodb.document_manager')->getRepository('AceFileBundle:File')
			->findOneBy(array('name' => $project_name, 'owner' => $user->getID()));
		
		if(!$file)
		{
			$error = -2;		
		}
		else
		{
			$error = 0;
			return $file;
		}		
	}
    
	
}
