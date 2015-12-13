<?php

namespace Id4v\Bundle\CarcheckBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LigneEntretien
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class LigneEntretien
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
     * @ORM\Column(name="designation", type="string", length=255)
     */
    private $designation;

    /**
     * @var integer
     *
     * @ORM\Column(name="qte", type="integer")
     */
    private $qte;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Id4v\Bundle\CarcheckBundle\Entity\Entretien", inversedBy="lignesFactures")
     * @ORM\JoinColumn(name="entretien_id", referencedColumnName="id")
     */
    private $entretien;


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
     * Set designation
     *
     * @param string $designation
     *
     * @return LigneEntretien
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set qte
     *
     * @param integer $qte
     *
     * @return LigneEntretien
     */
    public function setQte($qte)
    {
        $this->qte = $qte;

        return $this;
    }

    /**
     * Get qte
     *
     * @return integer
     */
    public function getQte()
    {
        return $this->qte;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return LigneEntretien
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set entretien
     *
     * @param \Id4v\Bundle\CarcheckBundle\Entity\Entretien $entretien
     *
     * @return LigneEntretien
     */
    public function setEntretien(\Id4v\Bundle\CarcheckBundle\Entity\Entretien $entretien = null)
    {
        $this->entretien = $entretien;

        return $this;
    }

    /**
     * Get entretien
     *
     * @return \Id4v\Bundle\CarcheckBundle\Entity\Entretien
     */
    public function getEntretien()
    {
        return $this->entretien;
    }
}
