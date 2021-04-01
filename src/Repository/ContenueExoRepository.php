<?php

namespace App\Repository;

use App\Entity\ContenueExo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContenueExo|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContenueExo|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContenueExo[]    findAll()
 * @method ContenueExo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContenueExoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContenueExo::class);
    }

    // /**
    //  * @return ContenueExo[] Returns an array of ContenueExo objects
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
    public function findOneBySomeField($value): ?ContenueExo
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
