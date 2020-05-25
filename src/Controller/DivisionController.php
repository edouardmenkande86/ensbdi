<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Article;
use App\Entity\Division;
use App\Entity\Service;
use App\Repository\DivisionRepository;
use Symfony\Component\HttpFoundation\Response;


class DivisionController extends AbstractController
{
 

    /**
     * @Route("/division/affaire academique", name="divisionaffacad_show", methods={"GET"})
     */
    public function divaffacad()
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

        //
        $carouseldivacad = $em->getRepository(Division::class)
                                ->getimgdivaffacad();

         //
         $infodivacad = $em->getRepository(Division::class)
                            ->divaffacadinfo();

         //
         $depliantdivacad = $em->getRepository(Division::class)
                              ->divdepliant();

         // service rattache
         $divacadservice = $em->getRepository(Service::class)
                                ->divaffacadservice();

        

        
        return $this->render('division/affaire.html.twig', [
            'controller_name' => 'DivisionController',
            'communiques'       => $listcom,
            'actualites'       => $listactu,
            'carouselacad'      => $carouseldivacad,
            'infodivacad'       => $infodivacad,
            'depliant'          => $depliantdivacad,
            'service'           => $divacadservice,
          
        ]);
    }

     /**
     * @Route("/division/service/{id}", name="service_show")
     */
    public function showservice($id){

              // On recupere l'EntityManager
         $em = $this->getDoctrine()
                     ->getManager();

            //recuperer toute les communiques
            $listcom = $em->getRepository(Article::class)
                    ->publiercom();  

            //recuperer toute les actualites
            $listactu = $em->getRepository(Article::class)
                    ->publieractu(); 

         // un service
        $oneservice = $em->getRepository(Service::class)
                         ->showservice($id);

         // depliant
         $depliant = $em->getRepository(Service::class)
                             ->getdepliant($id);

        // photo
        $image = $em->getRepository(Service::class)
                         ->getimage($id);

                         return $this->render('service/service.html.twig', [
                            'controller_name' => 'DivisionController',
                            'communiques'      => $listcom,
                            'actualites'       => $listactu,
                            'oneservice'       => $oneservice,
                            'depliant'          => $depliant,
                            'image'             => $image,
                        ]);

    }
}
