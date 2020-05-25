<?php

namespace App\Repository;

use App\Entity\Responsable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Responsable|null find($id, $lockMode = null, $lockVersion = null)
 * @method Responsable|null findOneBy(array $criteria, array $orderBy = null)
 * @method Responsable[]    findAll()
 * @method Responsable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResponsableRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Responsable::class);
    }

    // /**
    //  * @return Responsable[] Returns an array of Responsable objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Responsable
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getdirecteur(){

        return $this->createQueryBuilder('r')
                    ->where('r.id = 3') //condition
                    ->innerJoin('r.grade','g')
                    ->addSelect('g')
                     ->getQuery()
                    ->getResult()
                    ;
    }

    public function getdirecteuradj(){

        return $this->createQueryBuilder('r')
                    ->where('r.id = 4') //condition
                    ->innerJoin('r.grade','g')
                    ->addSelect('g')
                     ->getQuery()
                    ->getResult()
                    ;
    }

    public function getsecretaire(){

        return $this->createQueryBuilder('r')
                    ->where('r.id = 5') //condition
                    ->innerJoin('r.grade','g')
                    ->addSelect('g')
                     ->getQuery()
                    ->getResult()
                    ;
    }

    public function getdivess(){

        return $this->createQueryBuilder('r')
                    ->where('r.id = 6') //condition
                    ->innerJoin('r.grade','g')
                    ->addSelect('g')
                     ->getQuery()
                    ->getResult()
                    ;
    }

    public function getdivacad(){

        return $this->createQueryBuilder('r')
                    ->where('r.id = 7') //condition
                    ->innerJoin('r.grade','g')
                    ->addSelect('g')
                     ->getQuery()
                    ->getResult()
                    ;
    }

    public function getdivform(){

        return $this->createQueryBuilder('r')
                    ->where('r.id = 8') //condition
                    ->innerJoin('r.grade','g')
                    ->addSelect('g')
                     ->getQuery()
                    ->getResult()
                    ;
    }

    public function getdivadmin(){

        return $this->createQueryBuilder('r')
                    ->where('r.id = 9') //condition
                    ->innerJoin('r.grade','g')
                    ->addSelect('g')
                     ->getQuery()
                    ->getResult()
                    ;
    }

    public function getdivbil(){

        return $this->createQueryBuilder('r')
                    ->where('r.id = 10') //condition
                    ->innerJoin('r.grade','g')
                    ->addSelect('g')
                     ->getQuery()
                    ->getResult()
                    ;
    }

   
}
