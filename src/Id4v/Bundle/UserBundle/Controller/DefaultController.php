<?php

namespace Id4v\Bundle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('Id4vUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
