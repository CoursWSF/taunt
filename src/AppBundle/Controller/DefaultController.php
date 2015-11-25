<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Sound;
use AppBundle\Entity\Tag;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }

    /**
     * @Route("/login", name="loginAdministration")
     */
    public function loginAction(Request $request)
    {
        return $this->render('default/login.html.twig');
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
     * @Route("/create", name="createTag")
     */
    public function createTag(Request $request)
    {
      // create a task and give it some dummy data for this example
        $tag = new Tag();
        
        $form = $this->createFormBuilder($tag)
            ->add('name')
            ->add('save', 'submit')
            ->getForm();
        $form->handleRequest($request);    

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $tag = $form->getData();
            $em->persist($tag);
            $em->flush();

            /*return $this->redirectToRoute('moderation', array(
                'author' => $author
            ), 302);*/
        }

        return $this->render('default/newTag.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
