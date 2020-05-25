<?php

namespace App\Repository;

use App\Entity\Departement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Departement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Departement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Departement[]    findAll()
 * @method Departement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepartementRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Departement::class);
    }



    public function showcarinfo(){

        return $this->createQueryBuilder('d')  
         ->where('d.id = 2') //condition
        ->innerJoin('d.image','i')
        ->addSelect('i')
        ->innerJoin('d.responsable','r','WITH','d.id = 2')//responsable=TALLA
        ->addSelect('r')
        ->getQuery()
        ->getResult()
        ;

    }


    public function showdeptinfo(){

        return $this->createQueryBuilder('d')
                    ->where('d.id = 2') //condition
                   
                    ->innerJoin('d.responsable','r','WITH','d.id = 2')
                    ->addSelect('r')
                    ->innerJoin('d.attributions','at')
                    ->addSelect('at')
                    ->getQuery()
                    ->getResult();
    }

    public function infodepliant(){

        return $this->createQueryBuilder('d')
                      ->where('d.id = 2') //condition
                    ->innerJoin('d.responsable','r','WITH','d.id = 2')//
                    ->addSelect('r')
                    ->innerJoin('d.depliants','de')
                    ->addSelect('de')
                    ->getQuery()
                    ->getResult();
    }
    // /**
    //  * @return Departement[] Returns an array of Departement objects
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
    public function findOneBySomeField($value): ?Departement
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
