<?php

namespace AppBundle\Service\DAO;

use AppBundle\Entity\Referee;
use Doctrine\Common\Persistence\ObjectManager;


/**
 * Class ScoreDAO
 * @package AppBundle\Service\DAO
 */

class RefereeDAO {

    protected $em;

    public function __construct(ObjectManager $objectManager)
    {
        $this->em = $objectManager;
    }

    public function saveReferee(Referee $referee){

        $this->em->persist($referee);
        $this->em->flush();

    }

    public function getAllReferees(){

    }
}