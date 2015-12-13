<?php

namespace Id4v\Bundle\CarcheckBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as Mongo;

/**
 * Entretien
 *
 * @Mongo\Document()
 * @Mongo\HasLifecycleCallbacks()
 */
class Entretien
{
    /**
     * @var integer
     * @Mongo\Id()
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @Mongo\Date()
     */
    private $date;

    /**
     * @var integer
     *
     * @Mongo\Integer()
     */
    private $kilometrage;

    /**
     * @var float
     *
     * @Mongo\Float()
     */
    private $total;


    /**
     * @Mongo\EmbedOne(targetDocument="TypeEntretien")
     */
    private $type;

    /**
     * @Mongo\EmbedMany(targetDocument="LigneEntretien")
     */
    private $lignesFacture;

    /**
     * @Mongo\EmbedOne(targetDocument="Vehicule")
     */
    private $vehicule;

    /**
     * @var
     * @Mongo\Date()
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
        if($this->getType()->getPeriodique() && $this->getType()->getTypePeriode()==TypeEntretien::TYPE_ANNEE)
        {
            $date=clone $this->getDate();
            $this->setProchaineDate($date->add(new \DateInterval("P".$this->getType()->getPeriode()."Y")));
        }
    }


    /**
     * @Mongo\PrePersist()
     * @Mongo\PreUpdate()
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
     * @param Id4v\Bundle\CarcheckBundle\Document\TypeEntretien $type
     * @return self
     */
    public function setType(\Id4v\Bundle\CarcheckBundle\Document\TypeEntretien $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get type
     *
     * @return Id4v\Bundle\CarcheckBundle\Document\TypeEntretien $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add lignesFacture
     *
     * @param Id4v\Bundle\CarcheckBundle\Document\LigneEntretien $lignesFacture
     */
    public function addLignesFacture(\Id4v\Bundle\CarcheckBundle\Document\LigneEntretien $lignesFacture)
    {
        $this->lignesFacture[] = $lignesFacture;
    }

    /**
     * Remove lignesFacture
     *
     * @param Id4v\Bundle\CarcheckBundle\Document\LigneEntretien $lignesFacture
     */
    public function removeLignesFacture(\Id4v\Bundle\CarcheckBundle\Document\LigneEntretien $lignesFacture)
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
     * @param Id4v\Bundle\CarcheckBundle\Document\Vehicule $vehicule
     * @return self
     */
    public function setVehicule(\Id4v\Bundle\CarcheckBundle\Document\Vehicule $vehicule)
    {
        $this->vehicule = $vehicule;
        return $this;
    }

    /**
     * Get vehicule
     *
     * @return Id4v\Bundle\CarcheckBundle\Document\Vehicule $vehicule
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
