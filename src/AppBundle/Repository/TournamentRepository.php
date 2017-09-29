<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

/**
 * Class TournamentRepository
 * @package AppBundle\Repository
 */
class TournamentRepository extends EntityRepository
{
    /**
     * @return Query
     */
    public function getAllTournament()
    {
        // create query builder for the Tournament entity
        $qb = $this->createQueryBuilder("tr");

        $qb
            // ORDER BY statement
            ->orderBy("tr.id", "ASC")
        ;

        // return the query
        return $qb->getQuery();
    }
}
