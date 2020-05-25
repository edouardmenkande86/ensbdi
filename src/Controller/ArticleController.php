<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Categorie;
use App\Entity\Subcategorie;
use App\Entity\Responsable;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// toujours retirer la route du haut
class ArticleController extends AbstractController
{


     /**
     * @Route("/article/mot du directeur", name="directeur_show", methods={"GET"})
     */
        public function motdirecteur(){

                // On recupere l'EntityManager
                $em = $this->getDoctrine()
                ->getManager();

                //recuperer article mot du directeur
                $motdirecteur =  $em->GetRepository(Article::class)
                                    ->motdirecteur();

                //recuperer toute les communiques
            $listcom = $em->getRepository(Article::class)
                        ->publiercom();

            //recuperer toute les actualites
            $listactu = $em->getRepository(Article::class)
                            ->publieractu(); 

                      return $this->render('article/motdirecteur.html.twig', [
                        'motdirecteur' => $motdirecteur,
                        'communiques'          => $listcom,
                        'actualites'            => $listactu,
                    ]);

        }



     /**
     * @Route("/article/organigramme", name="organigramme_show", methods={"GET"})
     */
    public function organe(){

        // On recupere l'EntityManager
        $em = $this->getDoctrine()
                   ->getManager();

                   //recuperer article organigramme
                   $organigramme =  $em->GetRepository(Article::class)
                                        ->showorgan();

                      //recuperer toute les communiques
                $listcom = $em->getRepository(Article::class)
                              ->publiercom();

                 //recuperer toute les actualites
                 $listactu = $em->getRepository(Article::class)
                                 ->publieractu(); 
                    
                    // recuperation des organes adminitratifs
                    $listorgan = $em->GetRepository(Subcategorie::class)
                                    ->getlistorganigramme();
                        
                        //recuperation liste conseil
                    $listconseil =  $em->GetRepository(Subcategorie::class)
                                        ->getlistconseildir();

                    //
                    $listdirection =  $em->GetRepository(Subcategorie::class)
                                        ->getlistdirection();

                    $listdirectionAdj =  $em->GetRepository(Subcategorie::class)
                                         ->getlistdirectionAdjoint();

                    //
                    $listsecretariat =  $em->GetRepository(Subcategorie::class)
                                            ->getlistsecretariatgeneral();

                    //
                    $listdivisionetud =  $em->GetRepository(Subcategorie::class)
                                            ->getlistdivisionetude();

                    //
                    $listdivisionacad =  $em->GetRepository(Subcategorie::class)
                                        ->getlistdivisionacademique();

                    //
                    $listdivisionformation =  $em->GetRepository(Subcategorie::class)
                                                ->getlistdivisionformation();

                    //
                    $listdivisionadmin =  $em->GetRepository(Subcategorie::class)
                                            ->getlistdivisionadministrative();


                    //
                    $listdivisionbilingue =  $em->GetRepository(Subcategorie::class)
                                                ->getlistdivisionbilinguisme();

                    //
                    $listconseiletab =  $em->GetRepository(Subcategorie::class)
                                            ->getlistconseiletab();

                    //
                    $listassemblee =  $em->GetRepository(Subcategorie::class)
                                        ->getlistassemblee();

                    //
                    $listdepartement =  $em->GetRepository(Subcategorie::class)
                                            ->getlistdepartement();
                    
                    //
                    $departementdes =  $em->GetRepository(Categorie::class)
                                            ->departementdescript();

                    $directeur = $em->GetRepository(Responsable::class)
                                    ->getdirecteur();


                    $directeuradj = $em->GetRepository(Responsable::class)
                                     ->getdirecteuradj();
                    
                    $secretaire = $em->GetRepository(Responsable::class)
                                     ->getsecretaire();

                   $divess = $em->GetRepository(Responsable::class)
                                     ->getdivess();

                    $divacad = $em->GetRepository(Responsable::class)
                                     ->getdivacad();

                    $divform = $em->GetRepository(Responsable::class)
                                     ->getdivform();

                    $divadmin = $em->GetRepository(Responsable::class)
                                     ->getdivadmin();

                    $divbil = $em->GetRepository(Responsable::class)
                                     ->getdivbil();

                   


                                    return $this->render('article/organigramme.html.twig', [
                                        'controller_name' => 'ArticleController',
                                        'organigramme'        => $organigramme,
                                        'listorgan'           => $listorgan,
                                        'communiques'          => $listcom,
                                        'actualites'            => $listactu,
                                        'listconseil'          => $listconseil,
                                        'listdirection'         => $listdirection,
                                        'listdirectionAdj'       => $listdirectionAdj,
                                        'listsecretariat'       => $listsecretariat,
                                        'listdivisionetud'      => $listdivisionetud,
                                        'listdivisionacad'      => $listdivisionacad,
                                        'listdivisionformation'   => $listdivisionformation,
                                        'listdivisionadmin'         => $listdivisionadmin,
                                        'listdivisionbilingue'      =>  $listdivisionbilingue,
                                        'listconseiletab'             => $listconseiletab,
                                        'listassemblee'         =>  $listassemblee,
                                        'listdepartement'   => $listdepartement,
                                        'departementdes'    => $departementdes,
                                        'directeur'         => $directeur,
                                        'directeuradj'         => $directeuradj,
                                        'secretaire'            => $secretaire,
                                        'divess'                => $divess,
                                        'divacad'               => $divacad,
                                        'divform'               => $divform,
                                        'divadmin'              => $divadmin,
                                        'divbil'                => $divbil,
                                       

                                    ]);

                                    

                          }

    /** 
     * @Route("/admission", name="admission_show")
     */
    public function admissionparconcours(){

         // On recupere l'EntityManager
         $em = $this->getDoctrine()
                    ->getManager();

         // On recupere les images
         $listimage = $em->getRepository(Article::class)
                             ->publiercarousel();

      //recuperer toute les communiques
      $listcom = $em->getRepository(Article::class)
                    ->publiercom();  

       //recuperer toute les actualites
       $listactu = $em->getRepository(Article::class)
                        ->publieractu(); 

        //contenu admission
        $contenuadmission =  $em->getRepository(Subcategorie::class)
                                     ->contenuadmission(); 
         //
         $listcycle1 =  $em->getRepository(Subcategorie::class)
                              ->getlistadmissioncycle1();
                              
         //
         $listcycle2 =  $em->getRepository(Subcategorie::class)
                              ->getlistadmissioncycle2();

        //
        $pleindroit =  $em->getRepository(Subcategorie::class)
                         ->admissionpleindroit();
        
         //
         $titrecycle1 =  $em->getRepository(Subcategorie::class)
                             ->admissiontitrecycle1();

         //
         $titrecycle2 =  $em->getRepository(Subcategorie::class)
                             ->admissiontitrecycle2();

        //
        $auditeur =  $em->getRepository(Subcategorie::class)
                        ->auditeurlibre();

                        return $this->render('article/admission.html.twig', [
                            'controller_name' => 'ArticleController',
                            'imagescar' => $listimage,
                            'communiques' => $listcom,
                            'actualites'   => $listactu,
                            'admission'  => $contenuadmission,
                            'listcycle1'   => $listcycle1,
                            'listcycle2'   => $listcycle2,
                            'pleindroit'  => $pleindroit,
                            'titrecycle1'  => $titrecycle1,
                            'titrecycle2'  => $titrecycle2,
                            'auditeur'     => $auditeur,
                         
                        ]);



    }

    

    
}
