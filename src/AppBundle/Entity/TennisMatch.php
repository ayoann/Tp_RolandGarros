<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TennisMatch
 *
 * @ORM\Table(name="rg_tennis_match")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TennisMatchRepository")
 */
class TennisMatch
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tennis_match", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="duration", type="string", length=5, nullable=true)
     */
    private $duration;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Score", mappedBy="match")
     */
    private $teams;

    /**
     * @var Tournament
     * @ORM\ManyToOne(targetEntity="Tournament", inversedBy="matches")
     * @ORM\JoinColumn(name="tournament_id", referencedColumnName="id_tournament")
     */
    private $tournament;

    /**
     * @var Referee
     * @ORM\ManyToOne(targetEntity="Referee")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id_person")
     */
    private $referee;

    /**
     * @var TennisCourt
     * @ORM\ManyToOne(targetEntity="TennisCourt")
     * @ORM\JoinColumn(name="tennis_court_id", referencedColumnName="id_tennis_court")
     */
    private $tennisCourt;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->teams = new ArrayCollection();
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return TennisMatch
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set duration
     *
     * @param string $duration
     *
     * @return TennisMatch
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Add team
     *
     * @param Score $team
     *
     * @return TennisMatch
     */
    public function addTeam(Score $team)
    {
        $this->teams[] = $team;

        return $this;
    }

    /**
     * Remove team
     *
     * @param Score $team
     */
    public function removeTeam(Score $team)
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
     * Set tournament
     *
     * @param Tournament $tournament
     *
     * @return TennisMatch
     */
    public function setTournament(Tournament $tournament = null)
    {
        $this->tournament = $tournament;

        return $this;
    }

    /**
     * Get tournament
     *
     * @return Tournament
     */
    public function getTournament()
    {
        return $this->tournament;
    }

    /**
     * Set referee
     *
     * @param Referee $referee
     *
     * @return TennisMatch
     */
    public function setReferee(Referee $referee = null)
    {
        $this->referee = $referee;

        return $this;
    }

    /**
     * Get referee
     *
     * @return Referee
     */
    public function getReferee()
    {
        return $this->referee;
    }
}
