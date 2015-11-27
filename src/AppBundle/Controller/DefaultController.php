<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Sound;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $sounds = $this->getDoctrine()->getRepository("AppBundle:Sound")->findAll();

        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
            'sounds' => $sounds,
            'soundByName' => null
        ));
    }

    /**
     * @Route("/upload", name="uploadMp3")
     */
    public function uploadAction(Request $request)
    {

      $sound = new Sound();
      $form = $this->createFormBuilder($sound)
          ->add('name')
          ->add('file')
          ->add('dialogue')
          ->add('submit', 'submit')
          ->getForm();

      $form->handleRequest($request);

      if ($form->isValid()) {

        $em = $this->getDoctrine()->getManager();

        $sound->upload();

        $em->persist($sound);
        $em->flush();

        return $this->redirectToRoute('homepage');
      }

      return $this->render('default/upload.html.twig', array(
        'form' => $form->createView()
      ));
    }

    /**
     * @Route("/{name}", name="findByName")
     */
    public function findByNameAction(Request $request, $name)
    {
      $soundByName = $this->getDoctrine()->getRepository("AppBundle:Sound")->findByName($name);
      $sounds = $this->getDoctrine()->getRepository("AppBundle:Sound")->findAll();

      \dump($soundByName);

      return $this->render('default/index.html.twig', array(
        'sounds' => $sounds,
        'soundByName' => $soundByName
      ));
    }

    public function showNavBarAction(Request $request)
    {
      return $this->render('default/_navbar.html.twig');
    }

    /**
     * @Route("/search/{name}", name="searchByName")
     */
    public function searchByNameAction(Request $request, $name)
    {
      $soundByName = null;
      $sounds = $this->getDoctrine()->getRepository("AppBundle:Sound")->selectByName($name);

      return $this->render('default/index.html.twig', array(
        'sounds' => $sounds,
        'soundByName' => $soundByName
      ));
    }
}
