<?php

namespace App\Repository;

use App\Entity\Subcategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Subcategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Subcategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Subcategorie[]    findAll()
 * @method Subcategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubcategorieRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Subcategorie::class);
    }

    // /**
    //  * @return Subcategorie[] Returns an array of Subcategorie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Subcategorie
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getlistorganigramme(){

        return $this->createQueryBuilder('s')
                    ->innerJoin('s.categorie','c','WITH','c.id = 5')//categorie=organigramme
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult();
    }

    public function getlistconseildir(){
        return $this->createQueryBuilder('s')
                    ->innerJoin('s.categorie','c','WITH','c.id = 6')//categorie=conseil de direction
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult();

    }

    public function getlistdirection(){

        return $this->createQueryBuilder('s')
                    ->innerJoin('s.categorie','c','WITH','c.id = 7')//categorie=
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult();
    }

    public function getlistdirectionAdjoint(){

        return $this->createQueryBuilder('s')
                    ->innerJoin('s.categorie','c','WITH','c.id = 21')//categorie=
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult();
    }

    public function getlistsecretariatgeneral(){

        return $this->createQueryBuilder('s')
                    ->innerJoin('s.categorie','c','WITH','c.id = 8')//categorie=
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult();
    }

    public function getlistdivisionetude(){

        return $this->createQueryBuilder('s')
                    ->innerJoin('s.categorie','c','WITH','c.id = 9')//categorie=
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult();
    }

    public function getlistdivisionacademique(){

        return $this->createQueryBuilder('s')
                    ->innerJoin('s.categorie','c','WITH','c.id = 10')//categorie=
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult();
    }

    public function getlistdivisionformation(){

        return $this->createQueryBuilder('s')
                    ->innerJoin('s.categorie','c','WITH','c.id = 11')//categorie=
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult();

    }

    public function getlistdivisionadministrative(){

        return $this->createQueryBuilder('s')
                    ->innerJoin('s.categorie','c','WITH','c.id = 12')//categorie=
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult();
    }

    public function getlistdivisionbilinguisme(){

        return $this->createQueryBuilder('s')
                    ->innerJoin('s.categorie','c','WITH','c.id = 13')//categorie=
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult();
    }

    public function getlistconseiletab(){

        return $this->createQueryBuilder('s')
                    ->innerJoin('s.categorie','c','WITH','c.id = 14')//categorie=
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult();
    }

    public function getlistassemblee(){

        return $this->createQueryBuilder('s')
                    ->innerJoin('s.categorie','c','WITH','c.id = 15')//categorie=
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult();
    }

    public function getlistdepartement(){

        return $this->createQueryBuilder('s')
                    ->innerJoin('s.categorie','c','WITH','c.id = 16')//categorie=
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult();
    }

    public function getlistmission(){

        return $this->createQueryBuilder('s')
                    ->innerJoin('s.categorie','c','WITH','c.id = 17')//categorie=
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult();
    }

    public function getlistdiplome(){

        return $this->createQueryBuilder('s')
                    ->innerJoin('s.categorie','c','WITH','c.id = 25')//categorie=
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult();
    }

    public function getlistadmissioncycle1(){

        return $this->createQueryBuilder('s')
                    ->innerJoin('s.categorie','c','WITH','c.id = 27')//categorie=
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult();
    }

    public function getlistadmissioncycle2(){

        return $this->createQueryBuilder('s')
                    ->innerJoin('s.categorie','c','WITH','c.id = 28')//categorie=
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult();
    }

    public function contenuadmission(){

        return $this->createQueryBuilder('s')
                    ->innerJoin('s.categorie','c','WITH','c.id = 26')//categorie=
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult();
    }

    public function admissionpleindroit(){

        return $this->createQueryBuilder('s')
                    ->innerJoin('s.categorie','c','WITH','c.id = 29')//categorie=
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult();
    }

    public function admissiontitrecycle1(){

        return $this->createQueryBuilder('s')
                    ->innerJoin('s.categorie','c','WITH','c.id = 30')//categorie=
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult();
    }

    public function admissiontitrecycle2(){

        return $this->createQueryBuilder('s')
                    ->innerJoin('s.categorie','c','WITH','c.id = 31')//categorie=
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult();
    }

    public function auditeurlibre(){

        return $this->createQueryBuilder('s')
                    ->innerJoin('s.categorie','c','WITH','c.id = 32')//categorie=
                    ->addSelect('c')
                    ->getQuery()
                    ->getResult();
    }


    
}
