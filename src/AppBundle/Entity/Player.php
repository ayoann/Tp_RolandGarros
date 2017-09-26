<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlayerRepository")
 */
class Player extends Person
{
    /**
     * @var bool
     *
     * @ORM\Column(name="female", type="boolean")
     */
    private $female;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="Team", mappedBy="teams")
     */
    private $teams;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Nationality")
     * @ORM\JoinColumn(name="nationality_id", referencedColumnName="id_nationality")
     */
    private $nationality;

    /**
     * Set female
     *
     * @param boolean $female
     *
     * @return Player
     */
    public function setFemale($female)
    {
        $this->female = $female;

        return $this;
    }

    /**
     * Get female
     *
     * @return bool
     */
    public function getFemale()
    {
        return $this->female;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->teams = new ArrayCollection();
    }

    /**
     * Add team
     *
     * @param Team $team
     *
     * @return Player
     */
    public function addTeam(Team $team)
    {
        $this->teams[] = $team;

        return $this;
    }

    /**
     * Remove team
     *
     * @param Team $team
     */
    public function removeTeam(Team $team)
    {
        $this->teams->removeElement($team);
    }

    /**
     * Get teams
     *
     * @return Collection
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * Set nationality
     *
     * @param Nationality $nationality
     *
     * @return Player
     */
    public function setNationality(Nationality $nationality = null)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * Get nationality
     *
     * @return Nationality
     */
    public function getNationality()
    {
        return $this->nationality;
    }
}
