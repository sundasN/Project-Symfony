<?php

namespace Troiswa\BackBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Troiswa\BackBundle\Entity\Acteur;
use Symfony\Component\HttpFoundation\Request;
use Troiswa\BackBundle\Form\ActeurType;


class ActeurController extends Controller
{
    public function indexAction()
    {
        $actors = $this->getDoctrine()->getRepository("TroiswaBackBundle:Acteur")->findBy([], array('firstname' => 'ASC'));
        //var_dump($actors);
        //die();
       // $actors = [
           // ["id" =>0, "firstname" =>"Bruce", "lastname" => "willis", "gender" => "0", "biography" => "Walter Bruce Willis (born March 19, 1955) is an American actor, producer, and singer. His career began on the Off-Broadway stage and then in television in the 1980s, most notably as David Addison in Moonlighting (1985–89) and has continued both in television and film since, including comedic, dramatic and action roles. "],
           // ["id" =>1, "firstname" =>"Tom", "lastname" => "cruise", "gender" => "0", "biography" => "Tom Cruise (born Thomas Cruise Mapother IV; July 3, 1962) is an American actor and filmmaker. He has been nominated for three Academy Awards and has won three Golden Globe Awards. He started his career at age 19 in the 1981 film Endless Love. "],
           // ["id" =>2, "firstname" =>"Jennifer", "lastname" => "lawrence", "gender" => "1", "biography" => "Jennifer Shrader Lawrence (born August 15, 1990)[1] is an American actress. Her first major role was as a lead cast member on the TBS sitcom The Bill Engvall Show (2007–09). She appeared in the independent dramas The Burning Plain (2008) and Winter's Bone (2010), for which she received an Academy Award for Best Actress nomination. "],
           // ["id" =>2, "firstname" =>"angelina", "lastname" => "jolie", "gender" => "1", "biography" => "Angelina Jolie (/dʒoʊˈliː/ joh-lee; DCMG born Angelina Jolie Voight; June 4, 1975[1]) is an American actress, director, writer, and producer. She has won an Academy Award, two Screen Actors Guild Awards, and three Golden Globe Awards, and has been cited as Hollywood's highest-paid actress."]
       // ];
        return $this->render("TroiswaBackBundle:Acteur:index.html.twig",["actors" => $actors]);
    }

    public function showAction($id)
    {
        $actor = $this->getDoctrine()->getRepository("TroiswaBackBundle:Acteur")->find($id);
        if(empty($actor))
        {
            throw $this->createNotFoundException("Actor does not exist");
        }
        return $this->render("TroiswaBackBundle:Acteur:show.html.twig", ["actor" => $actor]);
    }

    public function addActorAction(Request $request)
    {
        $acteur = new Acteur();
        //$acteur -> setFirstname("ludo");
        $form = $this->createForm(new ActeurType(), $acteur)

            ->add('save', 'submit');

        $form -> handleRequest($request);
        //if("POST" == $request->getMethod())
        //{
            //$form->bind($request); // ici on met tt les infos ds l'objet
        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em -> persist($acteur);//si doctrine ne connait pa l'objet
            $em -> flush();
            return $this->redirect($this->generateUrl("troiswa_back_AddActor"));
        }
        //}
        //$actor = $this->getDoctrine()->getRepository("TroiswaBackBundle:Acteur");

        return $this->render("TroiswaBackBundle:Acteur:addActor.html.twig", array('form'=>$form->createView()));
    }

    public function editAction(Request $request, $id)
    {
        $acteur = $this->getDoctrine()->getRepository("TroiswaBackBundle:Acteur")->find($id);
        $form = $this->createFormBuilder($acteur)
            ->add('firstname', 'text')
            ->add('lastname', 'text')
            ->add('gender', 'choice', array(
                'choices'   => array(
                    '0' => 'Male',
                    '1' => 'Female'),
                'expanded' => true,
                'required' => true,
            ))
            ->add('dateOfBirth', 'date',array(
                'widget' => 'single_text'
            ))
            ->add('biography', 'textarea')
            ->add('save', 'submit')
            ->getForm();
        $form -> handleRequest($request);

        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em -> persist($acteur);//si doctrine ne connait pa l'objet
            $em -> flush();
            return $this->redirect($this->generateUrl("troiswa_back_AddActor"));
        }

        return $this->render("TroiswaBackBundle:Acteur:edit.html.twig", array('form'=>$form->createView()));
    }
}