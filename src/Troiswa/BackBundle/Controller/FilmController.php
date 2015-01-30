<?php

namespace Troiswa\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Troiswa\BackBundle\Entity\Films;
use Symfony\Component\HttpFoundation\Request;


class FilmController extends Controller
{
    public function indexAction(){
        $films = $this->getDoctrine()->getRepository("TroiswaBackBundle:Films")->findBy([], array('title' => 'ASC'));

        return $this->render("TroiswaBackBundle:Film:index.html.twig", ["films" => $films]);
    }

    public function showAction($id)
    {
        $film = $this->getDoctrine()->getRepository("TroiswaBackBundle:Films")->find($id);

        return $this->render("TroiswaBackBundle:Film:show.html.twig", ["film" => $film]);
    }

    public function addFilmAction(Request $request)
    {
        $film = new Films();
        $form = $this->createFormBuilder($film)
            ->add('title', 'text')
            ->add('description', 'textarea')
            ->add('releaseDate', 'date',array(
                'widget' => 'single_text'
            ))
            ->add('fichier', 'file')
            ->add('time', 'text')
            ->add('note', 'text')
            ->add('save', 'submit')
            ->getForm();

        $form -> handleRequest($request);
        //if("POST" == $request->getMethod())
        //{
        //$form->bind($request); // ici on met tt les infos ds l'objet
        if($form->isValid())
        {
            $film->upload();
            $em = $this->getDoctrine()->getManager();
            $em -> persist($film);//si doctrine ne connait pa l'objet
            $em -> flush();
            return $this->redirect($this->generateUrl("troiswa_back_films"));

        }
        //}
        //$actor = $this->getDoctrine()->getRepository("TroiswaBackBundle:Acteur");

        return $this->render("TroiswaBackBundle:Film:addFilm.html.twig", array('form'=>$form->createView()));
    }

    public function edit_filmAction(Request $request, $id)
    {
        $film = $this->getDoctrine()->getRepository("TroiswaBackBundle:Films")->find($id);
        $form = $this->createFormBuilder($film)
            ->add('Title', 'text')
            ->add('Description', 'textarea')
            ->add('ReleaseDate', 'date',array(
                'widget' => 'single_text'
            ))
            ->add('Image', 'text')
            ->add('Time', 'text')
            ->add('Note', 'text')
            ->add('save', 'submit')
            ->getForm();
        $form -> handleRequest($request);

        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em -> persist($form);//si doctrine ne connait pa l'objet
            $em -> flush();
            return $this->redirect($this->generateUrl("troiswa_back_edit_film"));
        }

        return $this->render("TroiswaBackBundle:Film:edit_film.html.twig", array('form'=>$form->createView()));
    }
}