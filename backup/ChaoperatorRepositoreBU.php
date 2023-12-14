<?php

namespace App\Repository;

use App\Entity\Chatoperator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Chatoperator>
 *
 * @method Chatoperator|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chatoperator|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chatoperator[]    findAll()
 * @method Chatoperator[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChatoperatorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Chatoperator::class);
    }

//    /**
//     * @return Chatoperator[] Returns an array of Chatoperator objects
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

//    public function findOneBySomeField($value): ?Chatoperator
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
