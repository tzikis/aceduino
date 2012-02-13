<?php

namespace Ace\EditorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;
use Ace\EditorBundle\Entity\EditorFile;

class DefaultController extends Controller
{
    public $default_file = "default_text.txt";
	public $directory = "/var/www/aceduino/symfony/files/";
    public function indexAction()
    {
		// if($name == "tzikis")
		// 	return $this->redirect($this->generateUrl('AceEditorBundle_list', array('name' => $name)));
		// 	
		if ($this->get('security.context')->isGranted('ROLE_USER'))
		{
	        // Load user content here
			return $this->redirect($this->generateUrl('AceEditorBundle_list'));
	    }
	
		return $this->render('AceEditorBundle:Default:index.html.twig');
    }

    public function listAction()
    {
		$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
	    $user = $this->getDoctrine()->getRepository('AceEditorBundle:EditorUser')->findOneByUsername($name);

	    if (!$user) {
	        throw $this->createNotFoundException('No user found with id '.$name);
	    }
		$files = $this->getDoctrine()->getRepository('AceEditorBundle:EditorFile')->findByOwner($user->getId());
	    // do something, like pass the $user object into a template
		$fullname= $user->getFirstname()." (".$user->getUsername().") ".$user->getLastname();
		        
		return $this->render('AceEditorBundle:Default:list.html.twig', array('name' =>$fullname, 'files' => $files));
    }

    public function editAction($project_name)
    {
		$examples_directory = "/var/www/aceduino/symfony/examples/";
		
		$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
		$user = $this->getDoctrine()->getRepository('AceEditorBundle:EditorUser')->findOneByUsername($name);
		$file = $this->getDoctrine()->getRepository('AceEditorBundle:EditorFile')->findOneByName($project_name);
		
		if(!$user)
		{
	        throw $this->createNotFoundException('No user found for username '.$name);
		}
		else if(!$file)
		{
	        throw $this->createNotFoundException('No file found for name '.$project_name);			
		}
		
		if($user->getId() != $file->getOwner())
		{
			return $this->redirect($this->generateUrl('AceEditorBundle_list'));
		}
		
		$filename=$file->getFilename();
			
		if(!file_exists($this->directory.$filename))
			return $this->redirect($this->generateUrl('AceEditorBundle_list'));

		// $filename = getcwd();
		$examples = $this->iterate_dir($examples_directory);
		for($i = 0; $i < count($examples); $i++ )
		{
			$array = $this->iterate_dir($examples_directory.$examples[$i]);
			$examples[$i] = array($examples[$i], $array);
		}
				
		$file = fopen($this->directory.$filename, 'r');
		$value = fread($file, filesize($this->directory.$filename));
		fclose($file);
        return $this->render('AceEditorBundle:Default:editor.html.twig', array('code' => $value, 'project_name' => $project_name, 'filename' => $filename, 'examples' => $examples));
    }

    public function saveAction()
    {
		$response = new Response('404 Not Found!', 404, array('content-type' => 'text/plain'));
	    if ($this->getRequest()->getMethod() === 'POST')
		{
			$project_name = $this->getRequest()->request->get('project_name');
			$mydata = $this->getRequest()->request->get('data');
			if($project_name && $mydata)
			{
				$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
				$user = $this->getDoctrine()->getRepository('AceEditorBundle:EditorUser')->findOneByUsername($name);
				$file = $this->getDoctrine()->getRepository('AceEditorBundle:EditorFile')->findOneBy(array('name' => $project_name, 'owner' => $user->getId()));
				// $directory = "/var/www/aceduino/symfony/files/";
				if(file_exists($this->directory.$file->getFilename()))
				{
					$file = fopen($this->directory.$file->getFilename(), 'w');
					fwrite($file, $mydata);
					fclose($file);
					$response->setContent("OK");
					$response->setStatusCode(200);
					$response->headers->set('Content-Type', 'text/html');
				}
			}
		}
		return $response;
    }	

    public function compileAction()
    {
		$response = new Response('404 Not Found!', 404, array('content-type' => 'text/plain'));
	    if ($this->getRequest()->getMethod() === 'POST')
		{
			$project_name = $this->getRequest()->request->get('project_name');
			if($project_name)
			{
				$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
				$user = $this->getDoctrine()->getRepository('AceEditorBundle:EditorUser')->findOneByUsername($name);
				$file = $this->getDoctrine()->getRepository('AceEditorBundle:EditorFile')->findOneBy(array('name' => $project_name, 'owner' => $user->getId()));
				// $directory = "/var/www/aceduino/symfony/files/";
				if(file_exists($this->directory.$file->getFilename()))
				{
					$extension = ".pde";
					$filename = $file->getFilename();
					system("cp /var/www/aceduino/symfony/files/".$filename." /var/www/aceduino/symfony/compiler/".$filename.$extension, $success);
					if(!$success)
					{
						$output = array();
						 exec("cd /var/www/aceduino/symfony/compiler/ && scons FILENAME=".$filename." 2>&1 1>/dev/null", $output, $success);
						if(!$success)
							// echo "Compiled succesfully!";
							$response->setContent(json_encode(array('success' => 1, 'text' => "Compiled succesfully!")));
						else
						{
							$output_string = "";
							$lines = array();
							for($i = 0; $i < count($output)-1; $i++)
							{
								$fat1 = "build/".$filename.$extension.":";
								$fat2 = "build/core/";
								$output[$i] = str_replace($fat1, " ", $output[$i]);
								$output[$i] = str_replace($fat2, " ", $output[$i]). "\n<br />";
								$output_string .= $output[$i];
								$colon = strpos($output[$i], ":");
								$number = intval(substr($output[$i], 0, $colon));
								$j = 0;
								for($j = 0; $j < $colon ; $j++)
								{
									if(!(strpos("1234567890", $output[$i]{$j}) === FALSE))
										break;
								}
								if(!($colon === FALSE) && $j < $colon)
								{
									// $lines[] = $number;
									$lines[] = $number;
								}
							}
							$response->setContent(json_encode(array('success' => 0, 'text' => $output_string, 'lines' => $lines)));
						}
						system("cp /var/www/aceduino/symfony/compiler/".$filename.".hex /var/www/aceduino/symfony/files/", $success);
						if(!$success)
							system("rm /var/www/aceduino/symfony/compiler/build/".$filename."* && rm /var/www/aceduino/symfony/compiler/".$filename."*", $success);
						$response->setStatusCode(200);
						$response->headers->set('Content-Type', 'text/html');
					}
				}
			}
		}
		return $response;
    }

    public function downloadAction($project_name, $type)
    {
		$examples_directory = "/var/www/aceduino/symfony/examples/";
		
		$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
		$user = $this->getDoctrine()->getRepository('AceEditorBundle:EditorUser')->findOneByUsername($name);
		$file = $this->getDoctrine()->getRepository('AceEditorBundle:EditorFile')->findOneByName($project_name);
		
		if(!$user)
		{
	        throw $this->createNotFoundException('No user found for username '.$name);
		}
		else if(!$file)
		{
	        throw $this->createNotFoundException('No file found for name '.$project_name);			
		}
		
		if($user->getId() != $file->getOwner())
		{
			return $this->redirect($this->generateUrl('AceEditorBundle_list'));
		}
		
		$filename=$file->getFilename();
		$extension = ".ino";
		if($type == 'hex')
		{
			$filename.='.hex';
			$extension = ".hex";
		}
			
		if(!file_exists($this->directory.$filename))
			return $this->redirect($this->generateUrl('AceEditorBundle_list'));
				
		$file = fopen($this->directory.$filename, 'r');
		$value = fread($file, filesize($this->directory.$filename));
		fclose($file);
		$headers = array('Content-Type'     => 'application/octet-stream',
		                 'Content-Disposition' => 'attachment;filename="'.$project_name.$extension.'"');

		return new Response($value, 200, $headers);
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
	    $user = $this->getDoctrine()->getRepository('AceEditorBundle:EditorUser')->findOneByUsername($name);

	    if (!$user) {
	        throw $this->createNotFoundException('No user found with username '.$name);
	    }
		//$files = $this->getDoctrine()->getRepository('AceEditorBundle:EditorFile')->findByOwner($product->getId());
	    // do something, like pass the $product object into a template
		//$fname= $product->getFirstname();
		//$lname= $product->getLastname();
		        
		return $this->render('AceEditorBundle:Default:options.html.twig', array('username' =>$name, 'settings' => $user));
    }
    
    public function setoptionsAction()
    {
    	$response = new Response('404 Not Found!', 404, array('content-type' => 'text/plain'));
	    if ($this->getRequest()->getMethod() === 'POST')
		{
			$mydata = $this->getRequest()->request->get('data');
			if($mydata)
			{
				$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
				$em = $this->getDoctrine()->getEntityManager();
				$user = $em->getRepository('AceEditorBundle:EditorUser')->findOneByUsername($name);
				
				$user->setFirstname($mydata);
				$em->flush();

				$response->setContent("OK");
				$response->setStatusCode(200);
				$response->headers->set('Content-Type', 'text/html');
			}
			return $response;
		}
		else
	        throw $this->createNotFoundException('No POST data!');		
    }

	public function createAction()
	{
	    if ($this->getRequest()->getMethod() === 'POST')
		{
			$project_name = $this->getRequest()->request->get('project_name');
			$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
		    $user = $this->getDoctrine()->getRepository('AceEditorBundle:EditorUser')->findOneByUsername($name);
		    if (!$user)
			{
		        throw $this->createNotFoundException('No user found with username '.$name);
		    }
			$files = $this->getDoctrine()->getRepository('AceEditorBundle:EditorFile')->findByOwner($user->getId());
			foreach ($files as $file)
			{
				if($project_name == $file->getName())
				{
					return $this->redirect($this->generateUrl('AceEditorBundle_list'));
				}
			}
			$filename = "";
			do
			{
				$filename = $this->genRandomString(10);
			}
			while(file_exists($filename));

			$file = fopen($this->directory.$this->default_file, 'r');
			$value = fread($file, filesize($this->directory.$this->default_file));
			fclose($file);

			$file = fopen($this->directory.$filename, 'x');
			if($file)
			{
				fwrite($file, $value);
				fclose($file);
			}

			$file = new EditorFile();
		    $file->setName($project_name);
		    $file->setFilename($filename);
		    $file->setOwner($user->getId());
			$file->setIsPublic(1);
			$file->setSchematic("");
			$file->setImage("");
						
		    $em = $this->getDoctrine()->getEntityManager();
		    $em->persist($file);
		    $em->flush();
			// return new Response($filename);
			return $this->redirect($this->generateUrl('AceEditorBundle_editor',array('project_name' => $project_name)));
		}
		else
	        throw $this->createNotFoundException('No POST data!');		
	}
	
	private function genRandomString($length)
	{
	    // $length = 10;
	    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $string = "";    
	    for ($p = 0; $p < $length; $p++)
		{
	        $string .= $characters{mt_rand(0, strlen($characters)-1)};
	    }
	    return $string;
	}
}
