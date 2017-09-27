<?php

namespace AppBundle\Service\DAO;
use AppBundle\Entity\Player;
use AppBundle\Repository\PlayerRepository;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class ScoreDAO
 * @package AppBundle\Service\DAO
 */

class PlayerDAO {

    /**
     * @var ObjectManager
     */
    private $em;

    /**
     * @var PlayerRepository
     */
    private $repoPlayer;

    public function __construct(ObjectManager $entityManager){
        $this->em = $entityManager;
    }

    public function savePlayer(Player $player){
        $this->em->persist($player);
        $this->em->flush();
    }

    public function getAllPlayers(){
        $this->repoPlayer->findAll();
    }

    public function getAllMenPlayers(){
        $qb = $this->em->createQueryBuilder();
        $qb->add('select', 'p')
            ->add('from', 'rg_person')
            ->add('where', 'p.female = ?1')
            ->setParameter(1, false);
    }

    public function getAllWomanPlayers(){
        $qb = $this->em->createQueryBuilder();
        $qb->add('select', 'p')
            ->add('from', 'rg_person')
            ->add('where', 'p.female = ?1')
            ->setParameter(1, true);
    }

    public function removePlayer(){

    }
}