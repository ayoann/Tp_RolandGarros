<?php
/**
 * Created by PhpStorm.
 * User: AsusG74S
 * Date: 26/09/2017
 * Time: 12:05
 */

namespace AppBundle\Service\DAO;



use Doctrine\ORM\EntityManager;

class MatchDAO
{
    public function __construct(EntityManager $entityManager){

        $this->em = $entityManager;

    }


    public function getAllMAtches(){

    }

    public function getAllFinishedMatches(){

    }

    public function getMatchById(){

    }

    public function saveMatch($match){
        $this->em->persist($match);
        $this->em->flush();
    }
}