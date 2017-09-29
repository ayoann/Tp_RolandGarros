<?php

namespace AppBundle\Service\DAO;

use AppBundle\Entity\Tournament;
use AppBundle\Repository\TournamentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManager;

/**
 * Class TournamentDAO
 * @package AppBundle\Service\DAO
 */
class TournamentDAO
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * TournamentDAO constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        // keep reference of the EntityManager
        $this->em = $entityManager;
    }

    /**
     * @return Collection
     * @throws \Exception
     */
    public function getAllTournament()
    {
        // get repository
        $repo = $this->getRepository();

        try {
            // get the query
            $query = $repo->getAllTournament();

            // return results find
            return new ArrayCollection($query->getResult());
        } catch (\Exception $exception) {
            throw new \Exception(
                "Une erreur est survenue lors de le recherche des tournois.",
                null,
                $exception
            );
        }
    }

    /**
     * @return TournamentRepository
     */
    private function getRepository()
    {
        return $this->em->getRepository(Tournament::class);
    }
}