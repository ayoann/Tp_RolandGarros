<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TournamentType
 *
 * @ORM\Table(name="rg_tournement_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TournamentTypeRepository")
 */
class TournamentType
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tournament_type", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="_tournament_type_name", type="string", length=20)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="tournament_type_number", type="integer")
     */
    private $number;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return TournamentType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return TournamentType
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }
}

