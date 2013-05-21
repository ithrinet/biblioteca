<?php

namespace Pasi\bibliotecaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BibliotecaBundle:Default:index.html.twig', array('name' => $name));
    }
}
