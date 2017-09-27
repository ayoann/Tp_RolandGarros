<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tournament
 *
 * @ORM\Table(name="rg_tournament")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TournamentRepository")
 */
class Tournament
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tournament", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tournament_name", type="string", length=20)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="tournament_simple", type="boolean")
     */
    private $simple;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_set_max", type="integer")
     */
    private $nbSetMax;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="TennisMatch", mappedBy="tournament")
     */
    private $matches;

    /**
     * @var TournamentType
     * @ORM\ManyToOne(targetEntity="TournamentType")
     * @ORM\JoinColumn(name="tournament_type_id", referencedColumnName="id_tournament_type")
     */
    private $type;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->matches = new ArrayCollection();
    }

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
     * @return Tournament
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
     * @return Tournament
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
     * @return Tournament
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

    /**
     * Add match
     *
     * @param TennisMatch $match
     *
     * @return Tournament
     */
    public function addMatch(TennisMatch $match)
    {
        $this->matches[] = $match;

        return $this;
    }

    /**
     * Remove match
     *
     * @param TennisMatch $match
     */
    public function removeMatch(TennisMatch $match)
    {
        $this->matches->removeElement($match);
    }

    /**
     * Get matches
     *
     * @return Collection
     */
    public function getMatches()
    {
        return $this->matches;
    }

    /**
     * Set type
     *
     * @param TournamentType $type
     *
     * @return Tournament
     */
    public function setType(TournamentType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return TournamentType
     */
    public function getType()
    {
        return $this->type;
    }
}
