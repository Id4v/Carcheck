<?php

namespace Id4v\Bundle\CarcheckBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vehicule
 * @ORM\Entity(repositoryClass="Id4v\Bundle\CarcheckBundle\Repositories\VehiculeRepository")
 * @ORM\Table()
 */
class Vehicule
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
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $kilometrage;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $immatriculation;

    /**
     * @ORM\OneToMany(targetEntity="Id4v\Bundle\CarcheckBundle\Entity\Entretien", mappedBy="vehicule")
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

    public function getTotalAfterAchat()
    {
        $total=0;
        /** @var Entretien $entretien */
        foreach($this->getEntretiens() as $entretien)
        {
            $achat=new \DateTime("15-08-2013");
            if($entretien->getDate() > $achat)
                $total+=$entretien->getTotal();
        }
        return $total;
    }
}
