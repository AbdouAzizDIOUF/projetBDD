<?php

namespace App\Repository;

use App\Entity\Parapharmacie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Parapharmacie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Parapharmacie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Parapharmacie[]    findAll()
 * @method Parapharmacie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParapharmacieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Parapharmacie::class);
    }

    // /**
    //  * @return Parapharmacie[] Returns an array of Parapharmacie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Parapharmacie
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
