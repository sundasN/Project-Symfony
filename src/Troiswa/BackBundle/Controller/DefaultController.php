<?php

namespace Troiswa\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
	//public function indexAction($name)
	//{
	   // return $this->render('TroiswaBackBundle:Default:index.html.twig', array('name' => $name));
	//}
	public function testAction()
	{
		//return new Response("testing if it will work");
        $name = "sundas";
        $age = 24;
        $actors = [
            ["firstname" =>"Bruce", "lastname" => "willis", "age" => 59],
            ["firstname" =>"Tom", "lastname" => "cruise", "age" => 52]
        ];
		return $this->render("TroiswaBackBundle:Default:test.html.twig",["firstname" => $name, "myAge" => $age, "allActors" => $actors]);
	}

	public function prenomAction()
	{
		return $this->render("TroiswaBackBundle:Default:prenom.html.twig");
    }

    public function themeAction()
    {
        return $this->render("TroiswaBackBundle:Default:theme.html.twig");
    }

}