<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nationality
 *
 * @ORM\Table(name="rg_nationality")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NationalityRepository")
 */
class Nationality
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_nationality", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nationalty_name", type="string", length=25, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="short_name", type="string", length=5, nullable=true)
     */
    private $shortName;


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
     * @return Nationality
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
     * Set shortName
     *
     * @param string $shortName
     *
     * @return Nationality
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;

        return $this;
    }

    /**
     * Get shortName
     *
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }
}

