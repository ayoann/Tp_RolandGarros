<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Score
 *
 * @ORM\Table(name="score")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ScoreRepository")
 */
class Score
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
     * @var int
     *
     * @ORM\Column(name="nbSetWin", type="integer")
     */
    private $nbSetWin;


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
    public function setNbSetWin(int $nbSetWin)
    {
        $this->nbSetWin = $nbSetWin;

        return $this;
    }

    /**
     * Get nbSetWin
     *
     * @return int
     */
    public function getNbSetWin(): int
    {
        return $this->nbSetWin;
    }
}

