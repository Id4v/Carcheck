<?php

namespace Id4v\Bundle\CarcheckBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeEntretien
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TypeEntretien
{
    const TYPE_ANNEE="annee";
    const TYPE_KM="km";
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
     * @var boolean
     *
     * @ORM\Column(name="periodique", type="boolean")
     */
    private $periodique;

    /**
     * @var integer
     *
     * @ORM\Column(name="periode", type="bigint")
     */
    private $periode;

    /**
     * @var string
     *
     * @ORM\Column(name="type_periode", type="string", length=50, columnDefinition="ENUM('annee','km')")
     */
    private $typePeriode;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="Id4v\Bundle\CarcheckBundle\Entity\Entretien", mappedBy="type")
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
     * @return TypeEntretien
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
     * Set periodique
     *
     * @param boolean $periodique
     *
     * @return TypeEntretien
     */
    public function setPeriodique($periodique)
    {
        $this->periodique = $periodique;

        return $this;
    }

    /**
     * Get periodique
     *
     * @return boolean
     */
    public function getPeriodique()
    {
        return $this->periodique;
    }

    /**
     * Set periode
     *
     * @param integer $periode
     *
     * @return TypeEntretien
     */
    public function setPeriode($periode)
    {
        $this->periode = $periode;

        return $this;
    }

    /**
     * Get periode
     *
     * @return integer
     */
    public function getPeriode()
    {
        return $this->periode;
    }

    /**
     * Set typePeriode
     *
     * @param string $typePeriode
     *
     * @return TypeEntretien
     */
    public function setTypePeriode($typePeriode)
    {
        $this->typePeriode = $typePeriode;

        return $this;
    }

    /**
     * Get typePeriode
     *
     * @return string
     */
    public function getTypePeriode()
    {
        return $this->typePeriode;
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
     * @return TypeEntretien
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
        return $this->getName()."";
    }


}
