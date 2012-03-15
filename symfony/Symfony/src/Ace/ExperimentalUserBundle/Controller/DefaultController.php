<?php

namespace Ace\ExperimentalUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('AceExperimentalUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
