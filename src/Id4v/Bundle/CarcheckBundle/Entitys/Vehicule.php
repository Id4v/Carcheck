<?php

namespace Id4v\Bundle\CarcheckBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vehicule
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Id4v\Bundle\CarcheckBundle\Entity\VehiculeRepository")
 *
 */
class Vehicule
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="kilometrage", type="bigint")
     */
    private $kilometrage;

    /**
     * @var string
     *
     * @ORM\Column(name="immatriculation", type="string", length=30)
     */
    private $immatriculation;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="Id4v\Bundle\CarcheckBundle\Entity\Entretien", mappedBy="vehicule")
     */
    private $entretiens;


    /**
     * Get id
     *
     * @return integer
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
     * @return Vehicule
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
     * Set kilometrage
     *
     * @param integer $kilometrage
     *
     * @return Vehicule
     */
    public function setKilometrage($kilometrage)
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    /**
     * Get kilometrage
     *
     * @return integer
     */
    public function getKilometrage()
    {
        return $this->kilometrage;
    }

    /**
     * Set immatriculation
     *
     * @param string $immatriculation
     *
     * @return Vehicule
     */
    public function setImmatriculation($immatriculation)
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    /**
     * Get immatriculation
     *
     * @return string
     */
    public function getImmatriculation()
    {
        return $this->immatriculation;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->entretiens = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add entretien
     *
     * @param \Id4v\Bundle\CarcheckBundle\Entity\Entretien $entretien
     *
     * @return Vehicule
     */
    public function addEntretien(\Id4v\Bundle\CarcheckBundle\Entity\Entretien $entretien)
    {
        $this->entretiens[] = $entretien;

        return $this;
    }

    /**
     * Remove entretien
     *
     * @param \Id4v\Bundle\CarcheckBundle\Entity\Entretien $entretien
     */
    public function removeEntretien(\Id4v\Bundle\CarcheckBundle\Entity\Entretien $entretien)
    {
        $this->entretiens->removeElement($entretien);
    }

    /**
     * Get entretiens
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEntretiens()
    {
        return $this->entretiens;
    }

    function __toString()
    {
        return $this->getName()." (".$this->getImmatriculation().")";
    }


}
