<?php

namespace AppBundle\Service\DAO;
use AppBundle\Entity\Player;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;

/**
 * Class ScoreDAO
 * @package AppBundle\Service\DAO
 */

class PlayerDAO {

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $entityManager) {
        $this->em = $entityManager;
    }

    /**
     * Get player repository
     * @return \AppBundle\Repository\PlayerRepository|\Doctrine\ORM\EntityRepository
     */
    public function getRepository() {
        return $this->em->getRepository(Player::class);
    }

    /**
     * Save player in database
     * @param Player $player
     */
    public function savePlayer(Player $player){
        $this->em->persist($player);
        $this->em->flush();
    }

    /**
     * Get players with teams info
     * @return ArrayCollection
     */
    public function getAllPlayersWithTeams(){
        $query = $this->getRepository()->getPlayersTeams();
        return new ArrayCollection($query->getResult());
    }

    /**
     * Get men players
     * @return ArrayCollection
     */
    public function getAllMenPlayers(){
        $query = $this->getRepository()->getMen();
        return new ArrayCollection($query->getResult());
    }

    /**
     * Get women players
     * @return ArrayCollection
     */
    public function getAllWomenPlayers(){
        $query = $this->getRepository()->getWomen();
        return new ArrayCollection($query->getResult());
    }

    /**
     * Remove player in database
     * @param Player $player
     */
    public function removePlayer(Player $player){
        $this->em->remove($player);
        $this->em->flush();
    }

    /**
     * Get one specific player
     * @param $id player
     * @return mixed
     */
    public function getPlayerById($id) {
        $query = $this->getRepository()->getPlayerById($id);
        return $query->getSingleResult();
    }
}