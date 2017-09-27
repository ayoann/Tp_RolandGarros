<?php

namespace AppBundle\Service\DAO;

use AppBundle\Entity\TennisMatch;
use AppBundle\Repository\TennisMatchRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManager;

/**
 * Class MatchDAO
 * @package AppBundle\Service\DAO
 */
class MatchDAO
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function saveMach(){

    }

    /**
     * @return Collection
     * @throws \Exception
     */
    public function getAllMatchsScored()
    {
        // get repository
        $repo = $this->getRepository();

        try {
            // get the query
            $query = $repo->getAllMatchsScored();

            return new ArrayCollection($query->getResult());
        } catch (\Exception $exception) {
            throw new \Exception(
                "Une erreur est survenue lors de le recherche des matches.",
                null,
                $exception
            );
        }
    }

    public function getAllDuoMatchs(){

    }

    public function getAllSimpleMarchs(){

    }

    /**
     * @return TennisMatchRepository
     */
    private function getRepository()
    {
        return $this->em->getRepository(TennisMatch::class);
    }
}