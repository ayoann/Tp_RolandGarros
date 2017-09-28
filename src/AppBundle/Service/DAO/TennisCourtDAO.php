<?php
/**
 * Created by PhpStorm.
 * User: Quentin
 * Date: 27/09/2017
 * Time: 09:53
 */

namespace AppBundle\Service\DAO;


use AppBundle\Entity\TennisCourt;
use Doctrine\Common\Persistence\ObjectManager;

class TennisCourtDAO
{
    protected $em;
    public function __construct(ObjectManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function saveTennisCourt(TennisCourt $tennisCourt) {

        $this->em->persist($tennisCourt);
        $this->em->flush();

    }

    public function getAllTennisCourt() {}

}