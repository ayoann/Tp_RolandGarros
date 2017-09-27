<?php

namespace AppBundle\Service\DAO;

use AppBundle\Entity\Referee;
use Doctrine\ORM\EntityManager;


/**
 * Class ScoreDAO
 * @package AppBundle\Service\DAO
 */

class RefereeDAO {

    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function saveReferee(Referee $referee){

        $this->em->persist($referee);
        $this->em->flush();

    }

    public function getAllReferees(){

    }
}