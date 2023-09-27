<?php

namespace App\Repository;

use App\Entity\Annonce;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Annonce>
 *
 * @method Annonce|null find($id, $lockMode = null, $lockVersion = null)
 * @method Annonce|null findOneBy(array $criteria, array $orderBy = null)
 * @method Annonce[]    findAll()
 * @method Annonce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnonceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Annonce::class);
    }

    public function save(Annonce $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Annonce $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    public function searchByTitle($query)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.titre LIKE :query')
            ->setParameter('query', '%' . $query . '%')
            ->getQuery()
            ->getResult();
    }

    public function searchAnnonces($query, $constructeur, $categorie, $min_price, $max_price)
    {

        $qb = $this->createQueryBuilder('a');

        if ($query) {
            $qb->andWhere('a.titre LIKE :query')
                ->setParameter('query', '%' . $query . '%');
        }

        if ($constructeur) {
            $constructeurEntity = $this->getEntityManager()->getReference('App\Entity\Constructeur', $constructeur);
            $qb->andWhere('a.constructeur = :constructeur')
                ->setParameter('constructeur', $constructeurEntity);
        }

        if ($categorie) {
            $categorieEntity = $this->getEntityManager()->getReference('App\Entity\Categorie', $categorie);
            $qb->andWhere('a.categorie = :categorie')
                ->setParameter('categorie', $categorieEntity);
        }

        if ($min_price) {
            $qb->andWhere('a.prix >= :min_price')
                ->setParameter('min_price', $min_price);
        }

        if ($max_price) {
            $qb->andWhere('a.prix <= :max_price')
                ->setParameter('max_price', $max_price);
        }

        return $qb->getQuery()->getResult();
    }

//    /**
//     * @return Annonce[] Returns an array of Annonce objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Annonce
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
