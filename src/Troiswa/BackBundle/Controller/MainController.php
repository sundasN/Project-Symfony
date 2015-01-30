<?php

namespace Troiswa\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render("TroiswaBackBundle:Main:index.html.twig");
    }
}