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
	public $examples_directory = "/var/www/aceduino/symfony/examples/";
	public $libs_directory = "/var/www/aceduino/symfony/libraries/";
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
		if (!$this->get('security.context')->isGranted('ROLE_USER'))
		{
	        // Load user content here
			return $this->redirect($this->generateUrl('AceEditorBundle_homepage'));
	    }


		$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
	    $user = $this->getDoctrine()->getRepository('AceExperimentalUserBundle:ExperimentalUser')->findOneByUsername($name);

	    if (!$user) {
	        throw $this->createNotFoundException('No user found with id '.$name);
	    }
		$fullname= $user->getFirstname()." (".$user->getUsername().") ".$user->getLastname();
		        
		return $this->render('AceEditorBundle:Default:list.html.twig', array('name' =>$fullname));
    }

    public function sidebarAction()
    {
		$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
	    $user = $this->getDoctrine()->getRepository('AceExperimentalUserBundle:ExperimentalUser')->findOneByUsername($name);

	    if (!$user) {
	        throw $this->createNotFoundException('No user found with id '.$name);
	    }
		$files = $this->getDoctrine()->getRepository('AceEditorBundle:EditorFile')->findByOwner($user->getId());
	    // do something, like pass the $user object into a template
		$fullname= $user->getFirstname()." (".$user->getUsername().") ".$user->getLastname();
		        
		return $this->render('AceEditorBundle:Default:sidebar.html.twig', array('files' => $files));
    }

    public function editAction($project_name)
    {		
		$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
		$user = $this->getDoctrine()->getRepository('AceExperimentalUserBundle:ExperimentalUser')->findOneByUsername($name);
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

		$hex_exists = false;
		if(file_exists($this->directory.$filename.".hex"))
			$hex_exists = true;
		// $filename = getcwd();
		$examples = $this->getExamplesAction($this->examples_directory,"");
		$lib_examples = $this->getExamplesAction($this->libs_directory,"/examples");
			
        return $this->render('AceEditorBundle:Default:editor.html.twig', array('project_name' => $project_name, 'filename' => $filename, 'examples' => $examples, 'lib_examples' => $lib_examples, 'hex_exists' => $hex_exists));
    }

	public function getDataAction($project_name)
	{
		$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
		$user = $this->getDoctrine()->getRepository('AceExperimentalUserBundle:ExperimentalUser')->findOneByUsername($name);
		$file = $this->getDoctrine()->getRepository('AceEditorBundle:EditorFile')->findOneByName($project_name);
		
		if(!$user || !$file || ($user->getId() != $file->getOwner()))
		{
			return new Response("");
		}
		else
		{
			$filename=$file->getFilename();
			if(!file_exists($this->directory.$filename))
					return new Response("");
				
				$file = fopen($this->directory.$filename, 'r');
				$value = fread($file, filesize($this->directory.$filename));
				fclose($file);
				return new Response($value);
		}		
	}
	
	public function getExamplesAction($mydir, $middle)
	{
		$examples = $this->iterate_dir($mydir);
		for($i = 0; $i < count($examples); $i++ )
		{
			$array = $this->iterate_dir($mydir.$examples[$i].$middle);
			$examples[$i] = array($examples[$i], $array);
		}		
		return $examples;
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
				$user = $this->getDoctrine()->getRepository('AceExperimentalUserBundle:ExperimentalUser')->findOneByUsername($name);
				$file = $this->getDoctrine()->getRepository('AceEditorBundle:EditorFile')->findOneBy(array('name' => $project_name, 'owner' => $user->getId()));
				// $directory = "/var/www/aceduino/symfony/files/";
				if(file_exists($this->directory.$file->getFilename()))
				{
					$blob = fopen($this->directory.$file->getFilename(), 'w');
					fwrite($blob, $mydata);
					fclose($blob);
					if(file_exists($this->directory.$file->getFilename().".hex"))
						unlink($this->directory.$file->getFilename().".hex");
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
				$user = $this->getDoctrine()->getRepository('AceExperimentalUserBundle:ExperimentalUser')->findOneByUsername($name);
				$file = $this->getDoctrine()->getRepository('AceEditorBundle:EditorFile')->findOneBy(array('name' => $project_name, 'owner' => $user->getId()));
				// $directory = "/var/www/aceduino/symfony/files/";
				if(file_exists($this->directory.$file->getFilename()))
				{
					$extension = ".pde";
					$filename = $file->getFilename();
					$this->cleanCompile();
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
						$this->cleanCompile();
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
		$user = $this->getDoctrine()->getRepository('AceExperimentalUserBundle:ExperimentalUser')->findOneByUsername($name);
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
	    $user = $this->getDoctrine()->getRepository('AceExperimentalUserBundle:ExperimentalUser')->findOneByUsername($name);

	    if (!$user) {
	        throw $this->createNotFoundException('No user found with username '.$name);
	    }
		//$files = $this->getDoctrine()->getRepository('AceEditorBundle:EditorFile')->findByOwner($product->getId());
	    // do something, like pass the $product object into a template
		//$fname= $product->getFirstname();
		//$lname= $product->getLastname();
		        
		return $this->render('AceEditorBundle:Default:options.html.twig', array('username' => $name, 'settings' => $user));
    }
    
    public function setoptionsAction()
    {
    	$response = new Response('404 Not Found!', 404, array('content-type' => 'text/plain'));
	    if ($this->getRequest()->getMethod() === 'POST')
		{
			$mydata = $this->getRequest()->request->get('data');
			if($mydata)
			{
				$fname = $mydata['firstname'];
				$lname = $mydata['lastname'];
				$mail  = $mydata['email'];
				$twitter = $mydata['tweet'];
				$oldpass = $mydata['old_pass'];
				$newpass = $mydata['new_pass'];
				
				$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
				$em = $this->getDoctrine()->getEntityManager();
				$user = $em->getRepository('AceExperimentalUserBundle:ExperimentalUser')->findOneByUsername($name);
				
				//update object
				$user->setFirstname($fname);
				$user->setLastname($lname);
				$user->setEmail($mail);
				$user->setTwitter($twitter);
				
				if($oldpass){
					if ($user->getPassword()===$oldpass)
					{
						$user->setPassword($newpass);
						$response->setContent('OK');
					}
					else
						$response->setContent('OK, Password Not Updated');
				}
				
				$em->flush();
							
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
			if($project_name == '')
			{
				return $this->redirect($this->generateUrl('AceEditorBundle_list'));
			}
			$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
		    $user = $this->getDoctrine()->getRepository('AceExperimentalUserBundle:ExperimentalUser')->findOneByUsername($name);
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
	
	public function imageAction()
	{
		$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
		$user = $this->getDoctrine()->getRepository('AceExperimentalUserBundle:ExperimentalUser')->findOneByUsername($name);
		if (!$user)
		{
			throw $this->createNotFoundException('No user found with id '.$name);
		}
		$image = $this->get_gravatar($user->getEmail());
	
		return $this->render('AceEditorBundle:Default:image.html.twig', array('user' => $user->getUsername(),'image' => $image));
	}
	
	public function fetchExampleAction($type, $category, $name)
	{
		$response = new Response('404 Not Found!', 404, array('content-type' => 'text/plain'));
		$directory = "";
		if($type == 1)
			$directory = $this->examples_directory;
		else if($type == 2)
			$directory = $this->libs_directory;
		$file_path = $directory.$category."/".$name."/".$name.".ino";
		if(file_exists($file_path))
		{
			$file = fopen($file_path, 'r');
			$value = fread($file, filesize($file_path));
			fclose($file);			
			$response->setContent($value);
			$response->setStatusCode(200);
			$response->headers->set('Content-Type', 'text/html');
		}
		return $response;
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
	
	private function cleanCompile()
	{
		system("rm /var/www/aceduino/symfony/compiler/build/*.pde");
		system("rm /var/www/aceduino/symfony/compiler/build/*.ino");
		system("rm /var/www/aceduino/symfony/compiler/build/*.cpp");
		system("rm /var/www/aceduino/symfony/compiler/*.pde");
		system("rm /var/www/aceduino/symfony/compiler/*.ino");
	}
	
	/**
	 * Get either a Gravatar URL or complete image tag for a specified email address.
	 *
	 * @param string $email The email address
	 * @param string $s Size in pixels, defaults to 80px [ 1 - 512 ]
	 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
	 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
	 * @param boole $img True to return a complete IMG tag False for just the URL
	 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
	 * @return String containing either just a URL or a complete image tag
	 * @source http://gravatar.com/site/implement/images/php/
	 */
	private function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
		$url = 'http://www.gravatar.com/avatar/';
		$url .= md5( strtolower( trim( $email ) ) );
		$url .= "?s=$s&d=$d&r=$r";
		if ( $img ) {
			$url = '<img src="' . $url . '"';
			foreach ( $atts as $key => $val )
				$url .= ' ' . $key . '="' . $val . '"';
			$url .= ' />';
		}
		return $url;
	}
}
