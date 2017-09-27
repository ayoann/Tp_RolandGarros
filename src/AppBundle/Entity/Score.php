<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Score
 *
 * @ORM\Table(name="rg_score")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ScoreRepository")
 */
class Score
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_score", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_set_win", type="integer", nullable=true)
     */
    private $nbSetWin;

    /**
     * @var Team
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="scores")
     * @ORM\JoinColumn(name="team_id", referencedColumnName="id_team")
     */
    private $team;

    /**
     * @var TennisMatch
     * @ORM\ManyToOne(targetEntity="TennisMatch", inversedBy="teams")
     * @ORM\JoinColumn(name="match_id", referencedColumnName="id_tennis_match")
     */
    private $match;

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
     * Set nbSetWin
     *
     * @param integer $nbSetWin
     *
     * @return Score
     */
    public function setNbSetWin($nbSetWin)
    {
        $this->nbSetWin = $nbSetWin;

        return $this;
    }

    /**
     * Get nbSetWin
     *
     * @return int
     */
    public function getNbSetWin()
    {
        return $this->nbSetWin;
    }

    /**
     * Set team
     *
     * @param Score $team
     *
     * @return Score
     */
    public function setTeam(Score $team = null)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return Score
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set match
     *
     * @param TennisMatch $match
     *
     * @return Score
     */
    public function setMatch(TennisMatch $match = null)
    {
        $this->match = $match;

        return $this;
    }

    /**
     * Get match
     *
     * @return TennisMatch
     */
    public function getMatch()
    {
        return $this->match;
    }
}
