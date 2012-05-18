<?php


namespace Ace\EditorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;
use Ace\EditorBundle\Entity\EditorFile;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Regex;
//use Ace\FileBundle\Controller\DefaultController;

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

	    if (!$user)
		{
	        throw $this->createNotFoundException('No user found with id '.$name);
	    }
		$fullname= $user->getFirstname()." ".$user->getLastname()." (".$user->getUsername().") ";
		        
		return $this->render('AceEditorBundle:Default:list.html.twig', array('name' =>$fullname));
    }

    public function sidebarAction()
    {
		$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
	    $user = $this->getDoctrine()->getRepository('AceExperimentalUserBundle:ExperimentalUser')->findOneByUsername($name);

	    if (!$user) {
	        throw $this->createNotFoundException('No user found with id '.$name);
	    }
		$files = $this->get('doctrine.odm.mongodb.document_manager')->getRepository('AceFileBundle:File')
			->findByOwner($user->getID());
				        
		return $this->render('AceEditorBundle:Default:sidebar.html.twig', array('files' => $files));
    }

    public function editAction($project_name)
    {		
		$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
		$user = $this->getDoctrine()->getRepository('AceExperimentalUserBundle:ExperimentalUser')->findOneByUsername($name);

		$hex_exists = false;
		
		$resp = $this->forward('AceFileBundle:Default:getTimestamp', array('project_name' => $project_name, 'type' => "code"));
		$codeTimestamp = $resp->getContent();
		
		$resp = $this->forward('AceFileBundle:Default:getTimestamp', array('project_name' => $project_name, 'type' => "hex"));
		$hexTimestamp = $resp->getContent();		
		if($hexTimestamp > $codeTimestamp)
			$hex_exists = true;

		$examples = $this->getExamplesAction($this->examples_directory,"");
		$lib_examples = $this->getExamplesAction($this->libs_directory,"/examples");
			
        return $this->render('AceEditorBundle:Default:editor.html.twig', array('project_name' => $project_name, 'examples' => $examples, 'lib_examples' => $lib_examples, 'hex_exists' => $hex_exists));
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

    public function compileAction()
    {
		$response = new Response('404 Not Found!', 404, array('content-type' => 'text/plain'));
		if ($this->getRequest()->getMethod() === 'POST')
		{			
			$project_name = $this->getRequest()->request->get('project_name');
			if($project_name)
			{
				$resp = $this->forward('AceFileBundle:Default:getCode', array('project_name' => $project_name));
				$value = $resp->getContent();
				
				$data = "ERROR";
				$url = fopen("http://compiler.codebender.cc?data=".urlencode($value), 'r');
				$data = fread($url, 30000);
				fclose($url);
				
				$json_data = json_decode($data, true);
				if($json_data['success'])
				{
					$resp = $this->forward('AceFileBundle:Default:saveHex', 
						array('project_name' => $project_name, 'data' => $json_data['hex']));
					unset($json_data['hex']);
					$data = json_encode($json_data);
				}				
				$response->setContent($data);
				$response->setStatusCode(200);
				$response->headers->set('Content-Type', 'text/html');
			}
		}
		return $response;
    }

    public function downloadAction($project_name, $type)
    {								
		$filename=$project_name;
		$extension = ".ino";
		$response;
		if($type == 'hex')
		{
			$response = $this->forward('AceFileBundle:Default:getHex', array('project_name' => $project_name));
			$extension = ".hex";
		}
		else
		{
			$response = $this->forward('AceFileBundle:Default:getCode', array('project_name' => $project_name));
		}
		
		$value = $response->getContent();
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
	
	//TODO:email is not loaded correctly if page is refreshed
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
    
    public function checkpassAction()
    {
    	$response = new Response('404 Not Found!', 404, array('content-type' => 'text/plain'));
    	
	    if ($this->getRequest()->getMethod() === 'POST')
		{
			
			$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
			$user = $this->getDoctrine()->getRepository('AceExperimentalUserBundle:ExperimentalUser')->findOneByUsername($name);
			$oldpass = $this->getRequest()->request->get('oldpass');
			
			//hash password
			$encoder_service = $this->get('security.encoder_factory');
			$encoder = $encoder_service->getEncoder($user);
			$encoded_pass = $encoder->encodePassword($oldpass, $user->getSalt());			
			
			if($user->getPassword()===$encoded_pass)
				$response->setContent('1');
			else
				$response->setContent('0');	
			$response->setStatusCode(200);
			$response->headers->set('Content-Type', 'text/html');
			return $response;
    	}
    	else
	        throw $this->createNotFoundException('No POST data!');	
    }
    
    public function checkmailAction()
    {
    	$response = new Response('404 Not Found!', 404, array('content-type' => 'text/plain'));
    	
	    if ($this->getRequest()->getMethod() === 'POST')
		{
			$mail = $this->getRequest()->request->get('mail');
			if($mail)
			{
				$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
				$em = $this->getDoctrine()->getEntityManager();
				$user = $em->getRepository('AceExperimentalUserBundle:ExperimentalUser')->findOneByEmail($mail);
				$current_user = $em->getRepository('AceExperimentalUserBundle:ExperimentalUser')->findOneByUsername($name);
				if(!$user)
					$response->setContent('1'); //email doesn't exist in database - success
				else if($user->getUsername() === $current_user->getUsername()) 
					$response->setContent('2'); //email is same as old one
				else
					$response->setContent('0'); //email is already in database from another user
				$response->setStatusCode(200);
				$response->headers->set('Content-Type', 'text/html');
			}
			return $response;
    	}
    	else
	        throw $this->createNotFoundException('No POST data!');	
    }
    
    //TODO:add checks for passwords
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
				$confirm_pass = $mydata['confirm_pass'];
				
				$name = $this->container->get('security.context')->getToken()->getUser()->getUsername();
				$em = $this->getDoctrine()->getEntityManager();
				$user = $em->getRepository('AceExperimentalUserBundle:ExperimentalUser')->findOneByUsername($name);
				
				//update object - no checks atm
				$user->setFirstname($fname);
				$user->setLastname($lname);
				$user->setTwitter($twitter);
				
				//set isvalid email check
				//$emailConstraint = new Email();
				//$emailConstraint->message = 'Email address is invalid or already in use';
				//$emailConstraint->pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
				$emailConstraint = new Regex( array( 
					'pattern' => '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
					'match' => true,
					'message' => 'Email address is invalid or already in use'
					));

				$errorList = $this->get('validator')->validateValue($mail, $emailConstraint);
				
				if(count($errorList)==0)
				{
					$user->setEmail($mail);
					$response->setContent('OK');
				}
				else
					$response->setContent($errorList[0]->getMessage());
				
				//TODO:hash the password
				/*
				if($oldpass){
					if ($user->getPassword()===$oldpass)
					{
						$user->setPassword($newpass);
						$response->setContent('OK');
					}
					else
						$response->setContent('OK, Password Not Updated');
				}
				*/
				//$response->setContent('OK');
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

			$file = fopen($this->directory.$this->default_file, 'r');
			$value = fread($file, filesize($this->directory.$this->default_file));
			fclose($file);

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
		$file_path = "";
		if($type == 1)
			$file_path = $this->examples_directory.$category."/".$name."/".$name.".ino";
		else if($type == 2)
			$file_path = $this->libs_directory.$category."/examples/".$name."/".$name.".ino";
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
 public function userAction($user){
	
	    $user = $this->getDoctrine()->getRepository('AceExperimentalUserBundle:ExperimentalUser')->findOneByUsername($user);

		//findBy(array('username' => 'tzikis', 'twitter' => 'bla'));
	    if (!$user) {
	        return new Response('There is no such user');
	    }
		
		$files = $this->get('doctrine.odm.mongodb.document_manager')->getRepository('AceFileBundle:File')->findByOwner($user->getId());
		
		if($user->getTwitter())
		{
			
			$result=@file_get_contents("http://api.twitter.com/1/statuses/user_timeline/{$user->getTwitter()}.json");
			if ( $result != false ) {
				$tweet=json_decode($result); // get tweets and decode them into a variable
				$lastTweet = $tweet[0]->text; // show latest tweet
			}
			else{
				$lastTweet="Not authorized";
			}
			
		}
		$image = $this->get_gravatar($user->getEmail());
		return $this->render('AceEditorBundle:Default:user.html.twig', array( 'user' => $user, 'files' => $files, 'lastTweet'=>$lastTweet, 'image'=>$image ));
 }
	
}
