<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
 * @ORM\Table(name="rg_player")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlayerRepository")
 */
class Player
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
     * @ORM\JoinColumn(name="nationality_id", referencedColumnName="id")
     */
    private $nationality;

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
        $this->teams = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add team
     *
     * @param \AppBundle\Entity\Team $team
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
     * @param \AppBundle\Entity\Team $team
     */
    public function removeTeam(Team $team)
    {
        $this->teams->removeElement($team);
    }

    /**
     * Get teams
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * Set nationality
     *
     * @param \AppBundle\Entity\Nationality $nationality
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
     * @return \AppBundle\Entity\Nationality
     */
    public function getNationality()
    {
        return $this->nationality;
    }
}
