<?php

namespace App\Repository;

use App\Entity\DemandeReservationLigne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DemandeReservationLigne|null find($id, $lockMode = null, $lockVersion = null)
 * @method DemandeReservationLigne|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemandeReservationLigne[]    findAll()
 * @method DemandeReservationLigne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandeReservationLigneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DemandeReservationLigne::class);
    }

    // /**
    //  * @return DemandeReservationLigne[] Returns an array of DemandeReservationLigne objects
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
    public function findOneBySomeField($value): ?DemandeReservationLigne
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
