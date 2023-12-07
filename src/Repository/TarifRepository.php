<?php

namespace App\Repository;

use App\Entity\Tarif;
use App\Entity\Gites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tarif>
 *
 * @method Tarif|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tarif|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tarif[]    findAll()
 * @method Tarif[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TarifRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tarif::class);
    }
    
    public function findTarifForGiteAndDateRange(Gites $gite, \DateTimeInterface $dateDebut, \DateTimeInterface $dateFin)
    {
        return $this->createQueryBuilder('t')
            ->where('t.gite = :gite')
            ->andWhere('t.debutPeriode <= :dateFin')
            ->andWhere('t.finPeriode >= :dateDebut')
            ->setParameter('gite', $gite)
            ->setParameter('dateDebut', $dateDebut)
            ->setParameter('dateFin', $dateFin)
            ->orderBy('t.debutPeriode', 'ASC')  // Ajoutez cette ligne si vous souhaitez trier les résultats par date de début
            ->getQuery()
            ->getResult();
    }

    public function findTarifsByGite(Gites $gite)
{
    return $this->createQueryBuilder('t')
        ->where('t.gite = :gite')
        ->setParameter('gite', $gite)
        ->orderBy('t.debutPeriode', 'ASC')
        ->getQuery()
        ->getResult();
}

//    /**
//     * @return Tarif[] Returns an array of Tarif objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Tarif
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
