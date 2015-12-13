<?php

namespace Id4v\Bundle\CarcheckBundle\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as Mongo;

/**
 * TypeEntretien
 * @Mongo\Document()
 */
class TypeEntretien
{
    const TYPE_ANNEE="annee";
    const TYPE_KM="km";
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
     * @var
     * @Mongo\EmbedMany(targetDocument="Periode")
     */
    private $periodes;

    /**
     * @var
     * @Mongo\EmbedMany(nullable=true, targetDocument="Entretien")
     */
    private $entretiens;

    function __toString()
    {
        return $this->getName()."";
    }
    public function __construct()
    {
        $this->entretiens = new \Doctrine\Common\Collections\ArrayCollection();
        $this->periodes =new ArrayCollection();
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

    /**
     * Add periode
     *
     * @param Id4v\Bundle\CarcheckBundle\Document\Periode $periode
     */
    public function addPeriode(\Id4v\Bundle\CarcheckBundle\Document\Periode $periode)
    {
        $this->periodes[] = $periode;
    }

    /**
     * Remove periode
     *
     * @param Id4v\Bundle\CarcheckBundle\Document\Periode $periode
     */
    public function removePeriode(\Id4v\Bundle\CarcheckBundle\Document\Periode $periode)
    {
        $this->periodes->removeElement($periode);
    }

    /**
     * Get periodes
     *
     * @return \Doctrine\Common\Collections\Collection $periodes
     */
    public function getPeriodes()
    {
        return $this->periodes;
    }
}
