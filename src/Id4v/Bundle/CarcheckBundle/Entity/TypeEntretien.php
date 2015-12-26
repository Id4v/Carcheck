<?php

namespace Id4v\Bundle\CarcheckBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TypeEntretien
 * @ORM\Entity()
 * @ORM\Table()
 */
class TypeEntretien
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
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="Id4v\Bundle\CarcheckBundle\Entity\Periode", mappedBy="typeEntretien", cascade={"persist"})
     */
    private $periodes;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="Id4v\Bundle\CarcheckBundle\Entity\Entretien", mappedBy="type")
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
     * @param Id4v\Bundle\CarcheckBundle\Entity\Entretien $entretien
     */
    public function addEntretien(\Id4v\Bundle\CarcheckBundle\Entity\Entretien $entretien)
    {
        $this->entretiens[] = $entretien;
    }

    /**
     * Remove entretien
     *
     * @param Id4v\Bundle\CarcheckBundle\Entity\Entretien $entretien
     */
    public function removeEntretien(\Id4v\Bundle\CarcheckBundle\Entity\Entretien $entretien)
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
     * @param Id4v\Bundle\CarcheckBundle\Entity\Periode $periode
     */
    public function addPeriode(\Id4v\Bundle\CarcheckBundle\Entity\Periode $periode)
    {
        $this->periodes[] = $periode;
    }

    /**
     * Remove periode
     *
     * @param Id4v\Bundle\CarcheckBundle\Entity\Periode $periode
     */
    public function removePeriode(\Id4v\Bundle\CarcheckBundle\Entity\Periode $periode)
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

    public function getPeriodeNumber()
    {
        return $this->periodes->count();
    }
}
