<?php

namespace App\Repository;

use App\Entity\ContenueCours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContenueCours|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContenueCours|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContenueCours[]    findAll()
 * @method ContenueCours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContenueCoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContenueCours::class);
    }

    // /**
    //  * @return ContenueCours[] Returns an array of ContenueCours objects
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
    public function findOneBySomeField($value): ?ContenueCours
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
