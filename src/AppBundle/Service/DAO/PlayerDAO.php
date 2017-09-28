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

    public function getRepository() {
        return $this->em->getRepository(Player::class);
    }

    public function savePlayer(Player $player){
        $this->em->persist($player);
        $this->em->flush();
    }

    public function getAllPlayersWithTeams(){
        $query = $this->getRepository()->getPlayersTeams();
        return new ArrayCollection($query->getResult());
    }

    public function getAllMenPlayers(){
        $query = $this->getRepository()->getMen();
        return new ArrayCollection($query->getResult());
    }

    public function getAllWomenPlayers(){
        $query = $this->getRepository()->getWomen();
        return new ArrayCollection($query->getResult());
    }

    public function removePlayer(Player $player){
        $this->em->remove($player);
        $this->em->flush();
    }

    public function getPlayerById($id) {
        $query = $this->getRepository()->getPlayerById($id);
        return $query->getSingleResult();
    }
}