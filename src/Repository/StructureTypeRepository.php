<?php

namespace App\Repository;

use App\Entity\StructureType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StructureType|null find($id, $lockMode = null, $lockVersion = null)
 * @method StructureType|null findOneBy(array $criteria, array $orderBy = null)
 * @method StructureType[]    findAll()
 * @method StructureType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StructureTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StructureType::class);
    }

    // /**
    //  * @return StructureType[] Returns an array of StructureType objects
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
    public function findOneBySomeField($value): ?StructureType
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
