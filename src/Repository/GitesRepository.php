<?php

namespace App\Repository;

use App\Entity\Gites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

/**
 * @extends ServiceEntityRepository<Gites>
 *
 * @method Gites|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gites|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gites[]    findAll()
 * @method Gites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GitesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gites::class);
    }

    public function findDistinctVilles(): array
    {
        return $this->createQueryBuilder('g')
            ->select('DISTINCT g.ville')
            ->orderBy('g.ville', 'ASC')
            ->getQuery()
            ->getResult();
    }
    public function findDistinctRegions(): array
{
    return $this->createQueryBuilder('g')
        ->select('DISTINCT g.region')
        ->orderBy('g.region', 'ASC')
        ->getQuery()
        ->getResult();
}

public function findDistinctDepartements(): array
{
    return $this->createQueryBuilder('g')
        ->select('DISTINCT g.departement')
        ->orderBy('g.departement', 'ASC')
        ->getQuery()
        ->getResult();
}

    /**
     * @return Gites[] Returns an array of Gites objects based on search criteria
     */
    public function findBySearchCriteria($criteria): array
    {
        $qb = $this->createQueryBuilder('g');

        // Filtre par ville
        if (!empty($criteria['ville'])) {
            $qb->andWhere('g.ville LIKE :ville')
                ->setParameter('ville', '%' . $criteria['ville'] . '%');
        }

        // Filtre par région
        if (!empty($criteria['region'])) {
            $qb->andWhere('g.region LIKE :region')
                ->setParameter('region', '%' . $criteria['region'] . '%');
        }

        // Filtre par département
        if (!empty($criteria['departement'])) {
            $qb->andWhere('g.departement = :departement')
                ->setParameter('departement', $criteria['departement']);
        }

        // Filtre par équipements
        if (!empty($criteria['equipements'])) {
            $qb->leftJoin('g.equipements', 'e');
            foreach ($criteria['equipements'] as $equipement) {
                switch ($equipement) {
                    case 'laveVaisselle':
                        $qb->andWhere('e.laveVaisselle = true');
                        break;
                    case 'laveLinge':
                        $qb->andWhere('e.laveLinge = true');
                        break;
                    case 'climatisation':
                        $qb->andWhere('e.climatisation = true');
                        break;
                    case 'television':
                        $qb->andWhere('e.television = true');
                        break;
                    case 'terrasse':
                        $qb->andWhere('e.terrasse = true');
                        break;
                    case 'barbecue':
                        $qb->andWhere('e.barbecue = true');
                        break;
                    case 'tennis':
                        $qb->andWhere('e.tennis = true');
                        break;
                    case 'pingPong':
                        $qb->andWhere('e.pingPong = true');
                        break;
                        // Ajoutez des cas pour chaque équipement que vous voulez filtrer
                }
            }
        }
          
                if (isset($criteria['piscine']) && $criteria['piscine'] !== '') {
                    $qb->leftJoin('g.equipements', 'piscine'); // Utilisation de l'alias 'piscine' pour la piscine
                    $qb->andWhere('piscine.piscine = :piscine')
                       ->setParameter('piscine', $criteria['piscine']);
                }
                


        // Filtre par services
        if (!empty($criteria['services'])) {
            $qb->leftJoin('g.services', 's');
            foreach ($criteria['services'] as $service) {
                switch ($service) {
                    case 'locationLinge':
                        $qb->andWhere('s.locationLinge = true');
                        break;
                    case 'menageFin':
                        $qb->andWhere('s.menageFin = true');
                        break;
                    case 'internet':
                        $qb->andWhere('s.internet = true');
                        break;
                        // Ajoutez des cas pour chaque service que vous voulez filtrer
                }
            }
        }

        // Ajoutez d'autres filtres si nécessaire

        return $qb->getQuery()->getResult();
    }

    //    /**
    //     * @return Gites[] Returns an array of Gites objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('g.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Gites
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
