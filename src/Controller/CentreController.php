<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Entity\Centre;

class CentreController extends AbstractController
{
    /**
     * @Route("/centre/documentation", name="centredoc_show")
     */
    public function index()
    {

                // On recupere l'EntityManager
                $em = $this->getDoctrine()
                        ->getManager();

                    //recuperer toute les communiques
                $listcom = $em->getRepository(Article::class)
                                ->publiercom(); 

                    //recuperer toute les actualites
                $listactu = $em->getRepository(Article::class)
                                    ->publieractu(); 

                 //recuperation image
                 $carousel = $em->getRepository(Centre::class)
                                 ->getimage();

                 //recuperation donnee
                 $centreinfo = $em->getRepository(Centre::class)
                                 ->centredocinfo();

                //recuperation depliant
                $depliant = $em->getRepository(Centre::class)
                                    ->centredepliant();

        return $this->render('centre/centredoc.html.twig', [
            'controller_name' => 'CentreController',
            'communiques'     => $listcom,
            'actualites'   => $listactu,
            'carousel'  => $carousel,
            'data'      => $centreinfo,
            'depliant'  => $depliant,
        ]);
    }
}


