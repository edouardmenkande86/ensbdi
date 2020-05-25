<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\DepartementRepository;
use App\Repository\ArticleRepository;
use App\Entity\Article;
use App\Entity\Departement;
use App\Entity\Division;
use App\Entity\Service;
use Symfony\Component\HttpFoundation\Response;


class DepartementController extends AbstractController
{
    
    /**
     * @Route("/departement/info", name="departement_info")
     */
    public function index()
    {

        // On recupere l'EntityManager
        $em = $this->getDoctrine()
                   ->getManager();

                   //recuperation image
                   $carousel = $em->getRepository(Departement::class)
                                   ->showcarinfo();
                                   
                    //recuperation information
                    $listinfo = $em->getRepository(Departement::class)
                                    ->showdeptinfo();

                    //recuperation depliant
                    $depliant = $em->getRepository(Departement::class)
                                    ->infodepliant();

                     //recuperer toute les communiques
                $listcom = $em->getRepository(Article::class)
                             ->publiercom(); 

                 //recuperer toute les actualites
                $listactu = $em->getRepository(Article::class)
                                 ->publieractu(); 


   

                      


        return $this->render('departement/info.html.twig', [
            'controller_name' => 'DepartementController',
            'infocar'         => $carousel,
            'information'     => $listinfo,
            'depliant'        => $depliant,
            'communiques'     => $listcom,
            'actualites'   => $listactu,

           
           

        ]);
    }


    
}
