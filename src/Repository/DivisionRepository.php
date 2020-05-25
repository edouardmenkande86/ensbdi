<?php

namespace App\Repository;

use App\Entity\Division;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Division|null find($id, $lockMode = null, $lockVersion = null)
 * @method Division|null findOneBy(array $criteria, array $orderBy = null)
 * @method Division[]    findAll()
 * @method Division[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DivisionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Division::class);
    }



    public function getimgdivaffacad(){
        return $this->createQueryBuilder('di')  
                     ->where('di.id = 1') //condition
                    ->innerJoin('di.images','i')
                    ->addSelect('i')
                  //  ->innerJoin('di.responsable','r','WITH','di.id = 7')//responsable=kollo
                  //  ->addSelect('r')
                    ->getQuery()
                    ->getResult()
                    ;

    }

    public function divaffacadinfo(){
        return $this->createQueryBuilder('di')
                     ->where('di.id = 1') //condition
                  //  ->innerJoin('di.responsable','r','WITH','di.id = 7')
                  //  ->addSelect('r')
                   // ->innerJoin('di.attributions','at')
                   // ->addSelect('at')
                    ->getQuery()
                    ->getResult();
    }

    public function divdepliant(){

        return $this->createQueryBuilder('di')
                     ->where('di.id = 1') //condition
                   // ->innerJoin('di.responsable','r','WITH','di.id = 7')//
                   // ->addSelect('r')
                    ->innerJoin('di.depliants','de')
                    ->addSelect('de')
                    ->getQuery()
                    ->getResult();
    }

    // /**
    //  * @return Division[] Returns an array of Division objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Division
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
