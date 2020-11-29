<?php

namespace App\Repository;

use App\Entity\Utlisaateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Utlisaateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Utlisaateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Utlisaateur[]    findAll()
 * @method Utlisaateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtlisaateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Utlisaateur::class);
    }

    // /**
    //  * @return Utlisaateur[] Returns an array of Utlisaateur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Utlisaateur
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
