<?php

namespace App\Repository;

use App\Entity\ProjetsCompetences;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProjetsCompetences|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjetsCompetences|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjetsCompetences[]    findAll()
 * @method ProjetsCompetences[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjetsCompetencesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProjetsCompetences::class);
    }

//    /**
//     * @return ProjetsCompetences[] Returns an array of ProjetsCompetences objects
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
    public function findOneBySomeField($value): ?ProjetsCompetences
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
