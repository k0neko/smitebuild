<?php

namespace FC\PlatformBundle\Repository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\ORM\EntityRepository;

class BuildRepository extends EntityRepository

{
    public function getPageBuilds($page, $nbPerPage)

    {

        $query = $this->createQueryBuilder('b')

            ->leftJoin('b.god', 'g')

            ->addSelect('g')

            ->leftJoin('b.item1', 'i')

            ->addSelect('i')

            ->leftJoin('b.item2', 'i2')

            ->addSelect('i2')

            ->leftJoin('b.item3', 'i3')

            ->addSelect('i3')

            ->leftJoin('b.item4', 'i4')

            ->addSelect('i4')

            ->leftJoin('b.item5', 'i5')

            ->addSelect('i5')
            ->leftJoin('b.item6', 'i6')

            ->addSelect('i6')
            ->leftJoin('b.user', 'u')

            ->addSelect('u')


            ->getQuery()

        ;


        $query

            // On définit l'annonce à partir de laquelle commencer la liste

            ->setFirstResult(($page-1) * $nbPerPage)

            // Ainsi que le nombre d'annonce à afficher sur une page

            ->setMaxResults($nbPerPage)

        ;


        return new Paginator($query, true);

    }

    public function getBuildSearch($searchString,$god, $tolerance = 3) {
        $queryBuilder = $this->createQueryBuilder('b')
            ->leftJoin('b.god','g')
            ->addSelect('g')

            ->leftJoin('b.item1', 'i')
            ->addSelect('i')

            ->leftJoin('b.item2', 'i2')
            ->addSelect('i2')

            ->leftJoin('b.item3', 'i3')
            ->addSelect('i3')

            ->leftJoin('b.item4', 'i4')
            ->addSelect('i4')

            ->leftJoin('b.item5', 'i5')
            ->addSelect('i5')

            ->leftJoin('b.item6', 'i6')
            ->addSelect('i6')


            ->where('LEVENSHTEIN(b.buildName,:searchString) <= :tolerance')
            ->andWhere('LEVENSHTEIN(g.name,:god) <= :tolerance')
            


            ->setParameter('searchString',$searchString)
            ->setParameter('tolerance',$tolerance)
            ->setParameter('god',$god)

        ;

        return $queryBuilder->getQuery()->getResult();
    }


}