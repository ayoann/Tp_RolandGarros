<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tournement
 *
 * @ORM\Table(name="tournement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TournementRepository")
 */
class Tournement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="simple", type="boolean")
     */
    private $simple;

    /**
     * @var int
     *
     * @ORM\Column(name="nbSetMax", type="integer")
     */
    private $nbSetMax;


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
     * @return Tournement
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
     * Set simple
     *
     * @param boolean $simple
     *
     * @return Tournement
     */
    public function setSimple($simple)
    {
        $this->simple = $simple;

        return $this;
    }

    /**
     * Get simple
     *
     * @return bool
     */
    public function getSimple()
    {
        return $this->simple;
    }

    /**
     * Set nbSetMax
     *
     * @param integer $nbSetMax
     *
     * @return Tournement
     */
    public function setNbSetMax($nbSetMax)
    {
        $this->nbSetMax = $nbSetMax;

        return $this;
    }

    /**
     * Get nbSetMax
     *
     * @return int
     */
    public function getNbSetMax()
    {
        return $this->nbSetMax;
    }
}

