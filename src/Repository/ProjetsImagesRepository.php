<?php

namespace App\Repository;

use App\Entity\ProjetsImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProjetsImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjetsImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjetsImages[]    findAll()
 * @method ProjetsImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjetsImagesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProjetsImages::class);
    }

//    /**
//     * @return ProjetsImages[] Returns an array of ProjetsImages objects
//     */
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
    public function findOneBySomeField($value): ?ProjetsImages
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
