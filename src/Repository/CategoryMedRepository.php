<?php

namespace App\Repository;

use App\Entity\CategoryMed;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategoryMed|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryMed|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryMed[]    findAll()
 * @method CategoryMed[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryMedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryMed::class);
    }

    // /**
    //  * @return CategoryMed[] Returns an array of CategoryMed objects
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
    public function findOneBySomeField($value): ?CategoryMed
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
