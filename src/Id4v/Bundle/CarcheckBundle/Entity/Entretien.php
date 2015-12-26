<?php

namespace Id4v\Bundle\CarcheckBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entretien
 *
 * @ORM\Entity()
 * @ORM\Table()
 * @ORM\HasLifecycleCallbacks()
 */
class Entretien
{
    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     * @ORM\Column(type="date",name="date")
     */
    private $date;

    /**
     * @var integer
     * @ORM\Column(name="kilometrage",type="integer")
     */
    private $kilometrage;

    /**
     * @var float
     * @ORM\Column(name="total",type="float")
     */
    private $total;


    /**
     * @ORM\ManyToOne(targetEntity="Id4v\Bundle\CarcheckBundle\Entity\TypeEntretien",inversedBy="entretiens")
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="Id4v\Bundle\CarcheckBundle\Entity\LigneEntretien",mappedBy="entretien", cascade={"persist"})
     */
    private $lignesFacture;

    /**
     * @ORM\ManyToOne(targetEntity="Id4v\Bundle\CarcheckBundle\Entity\Vehicule", inversedBy="entretiens")
     */
    private $vehicule;

    /**
     * @var
     * @ORM\Column(name="prochaine_date",type="date",nullable=true)
     */
    private $prochaineDate;

    private function calculeTotal()
    {
        $total=0;
        foreach($this->getLignesFacture() as $ligne){
            $total+=$ligne->getPrix();
        }

        $this->setTotal($total);
    }

    private function calculeProchaineDate()
    {
        $periodes=$this->getType()->getPeriodes();
        $periodeToCalculate=null;

        /** @var Periode $periode */
        foreach($periodes as $periode){
            if($periode->getType()==Periode::TYPE_ANNEE){
                $periodeToCalculate=$periode;
                break;
            }
        }

        if($periodeToCalculate)
        {
            $date=clone $this->getDate();
            $this->setProchaineDate($date->add(new \DateInterval("P".$periodeToCalculate->getValue()."Y")));
        }
    }


    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preSave()
    {
        $this->calculeTotal();
        $this->calculeProchaineDate();

    }
    public function __construct()
    {
        $this->lignesFacture = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set date
     *
     * @param date $date
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get date
     *
     * @return date $date
     */
    public function getDate()
    {
        return $this->date;
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
     * Set total
     *
     * @param float $total
     * @return self
     */
    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }

    /**
     * Get total
     *
     * @return float $total
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set type
     *
     * @param Id4v\Bundle\CarcheckBundle\Entity\TypeEntretien $type
     * @return self
     */
    public function setType(\Id4v\Bundle\CarcheckBundle\Entity\TypeEntretien $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get type
     *
     * @return Id4v\Bundle\CarcheckBundle\Entity\TypeEntretien $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add lignesFacture
     *
     * @param Id4v\Bundle\CarcheckBundle\Entity\LigneEntretien $lignesFacture
     */
    public function addLignesFacture(\Id4v\Bundle\CarcheckBundle\Entity\LigneEntretien $lignesFacture)
    {
        $lignesFacture->setEntretien($this);
        $this->lignesFacture[] = $lignesFacture;
    }

    /**
     * Remove lignesFacture
     *
     * @param Id4v\Bundle\CarcheckBundle\Entity\LigneEntretien $lignesFacture
     */
    public function removeLignesFacture(\Id4v\Bundle\CarcheckBundle\Entity\LigneEntretien $lignesFacture)
    {
        $this->lignesFacture->removeElement($lignesFacture);
    }

    /**
     * Get lignesFacture
     *
     * @return \Doctrine\Common\Collections\Collection $lignesFacture
     */
    public function getLignesFacture()
    {
        return $this->lignesFacture;
    }

    /**
     * Set vehicule
     *
     * @param Id4v\Bundle\CarcheckBundle\Entity\Vehicule $vehicule
     * @return self
     */
    public function setVehicule(\Id4v\Bundle\CarcheckBundle\Entity\Vehicule $vehicule)
    {
        $this->vehicule = $vehicule;
        return $this;
    }

    /**
     * Get vehicule
     *
     * @return Id4v\Bundle\CarcheckBundle\Entity\Vehicule $vehicule
     */
    public function getVehicule()
    {
        return $this->vehicule;
    }

    /**
     * Set prochaineDate
     *
     * @param date $prochaineDate
     * @return self
     */
    public function setProchaineDate($prochaineDate)
    {
        $this->prochaineDate = $prochaineDate;
        return $this;
    }

    /**
     * Get prochaineDate
     *
     * @return date $prochaineDate
     */
    public function getProchaineDate()
    {
        return $this->prochaineDate;
    }
}
