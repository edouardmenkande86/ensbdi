<?php

namespace App\Controller;
use App\Entity\Article;
use App\Entity\Subcategorie;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
//use Vich\UploaderBundle\Templating\Helper\UploaderHelper as helper;


// toujours retirer la route du haut
class AcceuilController extends AbstractController
{
    /**
     * @Route("/accueil", name="acceuil")
     */
    public function index()
    {

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
              

        return $this->render('acceuil/index.html.twig', [
            'controller_name' => 'AcceuilController',
            'imagescar' => $listimage,
            'communiques' => $listcom,
            'actualites'   => $listactu,
         
        ]);
    }

    /**
     * @Route("/communique/{id}", name="communique_show")
     */
     public function showcommunique($id)
    {
            // On recupere l'EntityManager
                $em = $this->getDoctrine()
                ->getManager();

                $article = $em->getRepository(Article::class)
                             ->showone($id);

                //on recupere les images du communique
                $findone = $em->getRepository(Article::class)
                               ->showonecom($id); 

                 //on recupere les fichiers du communique
                $findfichier = $em->getRepository(Article::class)
                                 ->showfichiercom($id); 

               //recuperer toute les communiques
                $listcom = $em->getRepository(Article::class)
                                 ->publiercom();  

                //recuperer toute les actualites
                $listactu = $em->getRepository(Article::class)
                              ->publieractu(); 

        return $this->render('article/communique.html.twig', [
            'controller_name' => 'AcceuilController',
            'communiques'     => $listcom,
            'onecoms'         =>$findone,
            'article'  => $article,
            'actualites'   => $listactu,
            'fichier'       => $findfichier,
        ]);
    }


     /**
     * @Route("/actualite/{id}", name="actualite_show")
     */
    public function showactu( $id)
    {
            // On recupere l'EntityManager
                $em = $this->getDoctrine()
                ->getManager();

                $article = $em->getRepository(Article::class)
                                ->showone($id);

                //on recupere les images de l'actualite
                $findone = $em->getRepository(Article::class)
                               ->showoneactualite($id);
                               
                //on recupere les fichiers de l'actualite
                $findfichier = $em->getRepository(Article::class)
                               ->showfichieractu($id);

               //recuperer tous les communiques
                $listcom = $em->getRepository(Article::class)
                             ->publiercom();  

                //recuperer toute les actualites
                $listactu = $em->getRepository(Article::class)
                                 ->publieractu();

        return $this->render('article/actualite.html.twig', [
            'controller_name' => 'AcceuilController',
            'communiques'     => $listcom,
            'oneactu'         => $findone,
            'article'  => $article,
            'actualites'   => $listactu,
            'fichier'       => $findfichier,
        ]);
    }

     /**
     * @Route("/missions", name="missions_show")
     */
    public function mission()
    {

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

                 $listmission =  $em->GetRepository(Subcategorie::class)
                                        ->getlistmission();

                 $listdiplome =  $em->GetRepository(Subcategorie::class)
                                    ->getlistdiplome();
              

        return $this->render('article/missionens.html.twig', [
            'controller_name' => 'AcceuilController',
            'imagescar' => $listimage,
            'communiques' => $listcom,
            'actualites'   => $listactu,
            'listmission'  => $listmission,
            'listdiplome'   => $listdiplome,
         
        ]);
    }

  

   
}
