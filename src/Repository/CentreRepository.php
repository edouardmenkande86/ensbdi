<?php

namespace App\Repository;

use App\Entity\Centre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Centre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Centre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Centre[]    findAll()
 * @method Centre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CentreRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Centre::class);
    }


    public function getimage(){
        return $this->createQueryBuilder('d')  
        ->where('d.id = 1') //condition
       ->innerJoin('d.images','i')
       ->addSelect('i')
      // ->innerJoin('d.responsable','r','WITH','d.id = 14')//responsable=
      // ->addSelect('r')
       ->getQuery()
       ->getResult()
       ;

    }

    public function centredocinfo(){

        return $this->createQueryBuilder('d')
                    ->where('d.id = 1') //condition
                     //->innerJoin('d.responsable','r','WITH','d.id = 14')
                    //->addSelect('r')
                    ->innerJoin('d.attributions','at')
                    ->addSelect('at')
                    ->getQuery()
                    ->getResult();
    }

    public function centredepliant(){

        return $this->createQueryBuilder('d')
                     ->where('d.id = 1') //condition
                   // ->innerJoin('d.responsable','r','WITH','d.id = 14')//
                    //->addSelect('r')
                    ->innerJoin('d.depliants','de')
                    ->addSelect('de')
                    ->getQuery()
                    ->getResult();
    }

    // /**
    //  * @return Centre[] Returns an array of Centre objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Centre
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
