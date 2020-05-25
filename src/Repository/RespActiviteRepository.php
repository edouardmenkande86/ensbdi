<?php

namespace App\Repository;

use App\Entity\RespActivite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RespActivite|null find($id, $lockMode = null, $lockVersion = null)
 * @method RespActivite|null findOneBy(array $criteria, array $orderBy = null)
 * @method RespActivite[]    findAll()
 * @method RespActivite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RespActiviteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RespActivite::class);
    }

    // /**
    //  * @return RespActivite[] Returns an array of RespActivite objects
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
    public function findOneBySomeField($value): ?RespActivite
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
