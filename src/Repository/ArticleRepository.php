<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function publiercarousel(){

      return $this->createQueryBuilder('a')  
                    ->where('a.visible = true') //condition
                    ->orderBy('a.date_debut', 'DESC')  //critere,date recente
                    ->innerJoin('a.images','i')
                    ->addSelect('i')
                    ->innerJoin('a.categorie','c', 'WITH','c.id = 2')//categorie=communique
                    ->addSelect('c')
                    ->setMaxResults(5)
                    ->getQuery()
                    ->getResult()
                    ;
        
    }
        //liste de communique a l'acceuil
    public function publiercom(){

        return $this->createQueryBuilder('a')
                    ->where('a.visible = true') //condition
                    ->orderBy('a.date_debut', 'DESC')  //critere,date recente
                    ->innerJoin('a.categorie','c', 'WITH','c.id = 2')//categorie=communique
                    ->addSelect('c')
                    ->setMaxResults(5)
                    ->getQuery()
                    ->getResult()
                    ;
        
    }
        //recuperer les images d'un communique pr le caroussel
    public function showonecom($id){

        return $this->createQueryBuilder('a')
                    ->where('a.id = :id') //condition
                    ->setParameter('id', $id)
                   // ->orderBy('a.date_fin', 'DESC')  //critere,date recente
                    ->innerJoin('a.images','i')
                    ->addSelect('i')
                    ->innerJoin('a.categorie','c', 'WITH','c.id = 2')//categorie=communique
                    ->addSelect('c')
                   // ->setMaxResults(5)
                    ->getQuery()
                    ->getResult()
                    ;
        
    }

     //recuperer les fichiers d'un communique
     public function showfichiercom($id){

        return $this->createQueryBuilder('a')
                    ->where('a.id = :id') //condition
                    ->setParameter('id', $id)
                    ->innerJoin('a.fichiers','i')
                    ->addSelect('i')
                    ->innerJoin('a.categorie','c', 'WITH','c.id = 2')//categorie=communique
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult()
                    ;
        
    }

      //liste de actualite a l'acceuil
      public function publieractu(){

        return $this->createQueryBuilder('a')
                    ->where('a.visible = true') //condition
                    ->orderBy('a.date_debut', 'DESC')  //critere,date recente
                    ->innerJoin('a.categorie','c', 'WITH','c.id = 3')//categorie=actualite
                    ->addSelect('c')
                    ->setMaxResults(5)
                    ->getQuery()
                    ->getResult()
                    ;
        
    }

        //pour le carousel actualite
    public function showoneactualite($id){

        return $this->createQueryBuilder('a')
                    ->where('a.id = :id') //condition
                    ->setParameter('id', $id)
                    ->innerJoin('a.images','i')
                    ->addSelect('i')
                    ->innerJoin('a.categorie','c', 'WITH','c.id = 3')//categorie=actualite
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult()
                    ;
        
    }

     //recuperer les fichiers d'un actualite
     public function showfichieractu($id){

        return $this->createQueryBuilder('a')
                    ->where('a.id = :id') //condition
                    ->setParameter('id', $id)
                    ->innerJoin('a.fichiers','i')
                    ->addSelect('i')
                    ->innerJoin('a.categorie','c', 'WITH','c.id = 3')//categorie=actualite
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult()
                    ;
        
    }

    public function showone($id){

        return $this->createQueryBuilder('a')
                    ->where('a.id = :id') //condition
                    ->setParameter('id', $id)
                    ->setMaxResults(1)
                    ->getQuery()
                    ->getResult()
                    ;
        
    }

    public function showorgan(){

         return $this->createQueryBuilder('a')  
               // ->where('a.visible = true') //condition
                ->innerJoin('a.images','i')
                ->addSelect('i')
                ->innerJoin('a.categorie','c', 'WITH','c.id = 5')//categorie=organigramme
                ->addSelect('c')
                ->getQuery()
                ->getResult();
                

    }
        //mot du directeur avec images
    public function motdirecteur(){

        return $this->createQueryBuilder('a')  
        // ->where('a.visible = true') //condition
         ->innerJoin('a.images','i')
         ->addSelect('i')
         ->innerJoin('a.categorie','c', 'WITH','c.id = 19')//categorie= Mot du directeur
         ->addSelect('c')
         ->getQuery()
         ->getResult();


    }

   
    // /**
    //  * @return Article[] Returns an array of Article objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Article
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
