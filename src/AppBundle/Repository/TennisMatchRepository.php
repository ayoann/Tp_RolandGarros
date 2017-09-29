<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

/**
 * Class TennisMatchRepository
 * @package AppBundle\Repository
 */
class TennisMatchRepository extends EntityRepository
{
    /**
     * @return Query
     */
    public function getAllMatchsScored()
    {
        // create query builder for the TennisMatch entity
        $qb = $this->createQueryBuilder('m');

        $qb
            // SELECT statement
            ->addSelect([
                "scores",
                "team",
                "players",
                "tournament",
                "referee",
                "tennisCourt",
            ])
            // JOIN statement
            ->innerJoin("m.teams", "scores")
            ->innerJoin("scores.team", "team")
            ->innerJoin("team.players", "players")
            ->innerJoin("m.tournament", "tournament")
            ->innerJoin("m.referee", "referee")
            ->innerJoin("m.tennisCourt", "tennisCourt")
            // WHERE statement
            ->where($qb->expr()->isNotNull("m.date"))
            // ORDER BY statement
            ->orderBy("m.date", "DESC")
        ;

        // return the query
        return $qb->getQuery();
    }

}
