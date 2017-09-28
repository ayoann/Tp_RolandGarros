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
        $qb = $this->createQueryBuilder("tr");

        $qb
            ->orderBy("tr.id", "ASC")
        ;

        return $qb->getQuery();
    }
}
