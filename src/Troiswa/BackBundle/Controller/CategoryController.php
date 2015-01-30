<?php

namespace Troiswa\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{
    public function indexAction(){
        $categories = $this->getDoctrine()->getRepository("TroiswaBackBundle:categories")->findAll();

        return $this->render("TroiswaBackBundle:Category:index.html.twig", ["categories" => $categories]);
    }
}