<?php

namespace Id4v\Bundle\CarcheckBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LigneEntretien
 * @ORM\Entity()
 * @ORM\Table()
 */
class LigneEntretien
{
    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="designation",type="string")
     */
    private $designation;

    /**
     * @var integer
     * @ORM\Column(name="qte",type="integer")
     */
    private $qte;

    /**
     * @var float
     * @ORM\Column(name="prix",type="float")
     */
    private $prix;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Id4v\Bundle\CarcheckBundle\Entity\Entretien", inversedBy="lignesFacture")
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
     * @param Id4v\Bundle\CarcheckBundle\Entity\Entretien $entretien
     * @return self
     */
    public function setEntretien(\Id4v\Bundle\CarcheckBundle\Entity\Entretien $entretien)
    {
        $this->entretien = $entretien;
        return $this;
    }

    /**
     * Get entretien
     *
     * @return Id4v\Bundle\CarcheckBundle\Entity\Entretien $entretien
     */
    public function getEntretien()
    {
        return $this->entretien;
    }
}
