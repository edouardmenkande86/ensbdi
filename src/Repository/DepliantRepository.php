<?php

namespace App\Repository;

use App\Entity\Depliant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Depliant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Depliant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Depliant[]    findAll()
 * @method Depliant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepliantRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Depliant::class);
    }

    // /**
    //  * @return Depliant[] Returns an array of Depliant objects
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
    public function findOneBySomeField($value): ?Depliant
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
