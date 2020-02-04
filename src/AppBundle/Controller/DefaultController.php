<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // Obtenga todas las ofertas y las ordene de manera descendente
        // 
        $poemas=[];
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('AppBundle:poemas');
      //  $poemas = $repo->findAll();
        
        return $this->render('default/index.html.twig', [
           'poemas' => $poemas
        ]);
    }
}
