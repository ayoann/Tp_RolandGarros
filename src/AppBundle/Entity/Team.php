<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="rg_team")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TeamRepository")
 */
class Team
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_team", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */


    private $id;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Score", mappedBy="team")
     */
    private $scores;

     /**
     * @ORM\ManyToMany(targetEntity="Player", inversedBy="players")
     * @ORM\JoinTable(name="team_players")
     */
    private $players;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->players = new ArrayCollection();
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
     * Add score
     *
     * @param Score $score
     *
     * @return Team
     */
    public function addScore(Score $score)
    {
        $this->scores[] = $score;

        return $this;
    }

    /**
     * Remove score
     *
     * @param Score $score
     */
    public function removeScore(Score $score)
    {
        $this->scores->removeElement($score);
    }

    /**
     * Get scores
     *
     * @return Collection
     */
    public function getScores()
    {
        return $this->scores;
    }

    /**
     * Add player
     *
     * @param Player $player
     *
     * @return Team
     */
    public function addPlayer(Player $player)
    {
        $this->players[] = $player;

        return $this;
    }

    /**
     * Remove player
     *
     * @param Player $player
     */
    public function removePlayer(Player $player)
    {
        $this->players->removeElement($player);
    }

    /**
     * Get players
     *
     * @return Collection
     */
    public function getPlayers()
    {
        return $this->players;
    }
}
