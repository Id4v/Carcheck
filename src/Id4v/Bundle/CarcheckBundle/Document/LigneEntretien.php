<?php

namespace Id4v\Bundle\CarcheckBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as Mongo;
use Doctrine\ORM\Mapping as ORM;

/**
 * LigneEntretien
 * @Mongo\Document()
 */
class LigneEntretien
{
    /**
     * @var integer
     *
     * @Mongo\Id()
     */
    private $id;

    /**
     * @var string
     *
     * @Mongo\String()
     */
    private $designation;

    /**
     * @var integer
     *
     * @Mongo\Integer()
     */
    private $qte;

    /**
     * @var float
     * @Mongo\Float()
     */
    private $prix;

    /**
     * @var
     * @Mongo\EmbedOne(targetDocument="Entretien")
     */
    private $entretien;

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
     * Set designation
     *
     * @param string $designation
     * @return self
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;
        return $this;
    }

    /**
     * Get designation
     *
     * @return string $designation
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set qte
     *
     * @param integer $qte
     * @return self
     */
    public function setQte($qte)
    {
        $this->qte = $qte;
        return $this;
    }

    /**
     * Get qte
     *
     * @return integer $qte
     */
    public function getQte()
    {
        return $this->qte;
    }

    /**
     * Set prix
     *
     * @param float $prix
     * @return self
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
        return $this;
    }

    /**
     * Get prix
     *
     * @return float $prix
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set entretien
     *
     * @param Id4v\Bundle\CarcheckBundle\Document\Entretien $entretien
     * @return self
     */
    public function setEntretien(\Id4v\Bundle\CarcheckBundle\Document\Entretien $entretien)
    {
        $this->entretien = $entretien;
        return $this;
    }

    /**
     * Get entretien
     *
     * @return Id4v\Bundle\CarcheckBundle\Document\Entretien $entretien
     */
    public function getEntretien()
    {
        return $this->entretien;
    }
}
