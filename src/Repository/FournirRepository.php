<?php

namespace App\Repository;

use App\Entity\Fournir;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fournir|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fournir|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fournir[]    findAll()
 * @method Fournir[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FournirRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fournir::class);
    }

    // /**
    //  * @return Fournir[] Returns an array of Fournir objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fournir
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
