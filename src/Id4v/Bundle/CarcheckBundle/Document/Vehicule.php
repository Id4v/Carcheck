<?php

namespace Id4v\Bundle\CarcheckBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as Mongo;

/**
 * Vehicule
 * @Mongo\Document(repositoryClass="Id4v\Bundle\CarcheckBundle\Repositories\VehiculeRepository")
 *
 */
class Vehicule
{
    /**
     * @var integer
     * @Mongo\Id()
     */
    private $id;

    /**
     * @var string
     * @Mongo\String()
     */
    private $name;

    /**
     * @var integer
     * @Mongo\Integer()
     */
    private $kilometrage;

    /**
     * @var string
     * @Mongo\String()
     */
    private $immatriculation;

    /**
     * @Mongo\EmbedMany(targetDocument="Entretien")
     */
    private $entretiens;

    function __toString()
    {
        return $this->getName()." (".$this->getImmatriculation().")";
    }
    public function __construct()
    {
        $this->entretiens = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set kilometrage
     *
     * @param integer $kilometrage
     * @return self
     */
    public function setKilometrage($kilometrage)
    {
        $this->kilometrage = $kilometrage;
        return $this;
    }

    /**
     * Get kilometrage
     *
     * @return integer $kilometrage
     */
    public function getKilometrage()
    {
        return $this->kilometrage;
    }

    /**
     * Set immatriculation
     *
     * @param string $immatriculation
     * @return self
     */
    public function setImmatriculation($immatriculation)
    {
        $this->immatriculation = $immatriculation;
        return $this;
    }

    /**
     * Get immatriculation
     *
     * @return string $immatriculation
     */
    public function getImmatriculation()
    {
        return $this->immatriculation;
    }

    /**
     * Add entretien
     *
     * @param Id4v\Bundle\CarcheckBundle\Document\Entretien $entretien
     */
    public function addEntretien(\Id4v\Bundle\CarcheckBundle\Document\Entretien $entretien)
    {
        $this->entretiens[] = $entretien;
    }

    /**
     * Remove entretien
     *
     * @param Id4v\Bundle\CarcheckBundle\Document\Entretien $entretien
     */
    public function removeEntretien(\Id4v\Bundle\CarcheckBundle\Document\Entretien $entretien)
    {
        $this->entretiens->removeElement($entretien);
    }

    /**
     * Get entretiens
     *
     * @return \Doctrine\Common\Collections\Collection $entretiens
     */
    public function getEntretiens()
    {
        return $this->entretiens;
    }
}
