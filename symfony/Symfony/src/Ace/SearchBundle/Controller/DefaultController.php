<?php

namespace Ace\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    public function indexAction()
    {
        if ($this->getRequest()->getMethod() === 'GET') {
            
            $query = $this->getRequest()->query->get('query');

			$repository = $this->getDoctrine()->getRepository('AceExperimentalUserBundle:ExperimentalUser');
			$users = $repository->createQueryBuilder('u')
			    ->where('u.username = :name OR u.firstname = :name OR u.lastname = :name OR u.twitter = :name')
				->setParameter('name', $query)->getQuery()->getResult();

			$files = $this->get('doctrine.odm.mongodb.document_manager')->getRepository('AceFileBundle:File')->findByName($query)->toArray();

            $owners = '';

			// return new Response($files);
			if($files)
			{
				foreach ($files as $file)
				{
					$owners[$file->getOwner()] = $this->getDoctrine()
					->getRepository('AceExperimentalUserBundle:ExperimentalUser')->findOneById($file->getOwner());
				}
			}
			else
				$files = null;
			        return $this->render('AceSearchBundle:Default:index.html.twig', array('query'=>$query, 'users'=>$users, 'files'=>$files, 'owners'=>$owners));
        }
    }
}
