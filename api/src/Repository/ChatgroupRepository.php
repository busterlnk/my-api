<?php

namespace App\Repository;

use App\Entity\Chatgroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Chatgroup>
 *
 * @method Chatgroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chatgroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chatgroup[]    findAll()
 * @method Chatgroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChatgroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Chatgroup::class);
    }

//    /**
//     * @return Chatgroup[] Returns an array of Chatgroup objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Chatgroup
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
