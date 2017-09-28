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
        $qb = $this->createQueryBuilder('m');

        $qb
            ->addSelect([
                "scores",
                "team",
                "players",
                "tournament",
                "referee",
                "tennisCourt",
            ])
            ->innerJoin("m.teams", "scores")
            ->innerJoin("scores.team", "team")
            ->innerJoin("team.players", "players")
            ->innerJoin("m.tournament", "tournament")
            ->innerJoin("m.referee", "referee")
            ->innerJoin("m.tennisCourt", "tennisCourt")
            ->where($qb->expr()->isNotNull("m.date"))
            ->orderBy("m.date", "DESC")
        ;

        return $qb->getQuery();
    }

}
