<?php

namespace CleverAge\SymfponyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CleverAgeSymfponyBundle:Default:index.html.twig');
    }
}
