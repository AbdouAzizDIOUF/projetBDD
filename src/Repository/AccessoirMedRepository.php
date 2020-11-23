<?php

namespace App\Repository;

use App\Entity\AccessoirMed;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AccessoirMed|null find($id, $lockMode = null, $lockVersion = null)
 * @method AccessoirMed|null findOneBy(array $criteria, array $orderBy = null)
 * @method AccessoirMed[]    findAll()
 * @method AccessoirMed[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccessoirMedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AccessoirMed::class);
    }

    // /**
    //  * @return AccessoirMed[] Returns an array of AccessoirMed objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AccessoirMed
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
