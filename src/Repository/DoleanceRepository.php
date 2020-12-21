<?php

namespace App\Repository;

use App\Entity\Doleance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Doleance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Doleance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Doleance[]    findAll()
 * @method Doleance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DoleanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Doleance::class);
    }

    // /**
    //  * @return Doleance[] Returns an array of Doleance objects
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
    public function findOneBySomeField($value): ?Doleance
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
