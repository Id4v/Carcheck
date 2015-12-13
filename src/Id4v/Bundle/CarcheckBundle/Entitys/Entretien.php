<?php

namespace Id4v\Bundle\CarcheckBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entretien
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Entretien
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="kilometrage", type="bigint")
     */
    private $kilometrage;

    /**
     * @var float
     *
     * @ORM\Column(name="total", type="float")
     */
    private $total;


    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Id4v\Bundle\CarcheckBundle\Entity\TypeEntretien", inversedBy="entretiens")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     */
    private $type;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="Id4v\Bundle\CarcheckBundle\Entity\LigneEntretien", mappedBy="entretien", cascade={"persist"})
     */
    private $lignesFacture;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Id4v\Bundle\CarcheckBundle\Entity\Vehicule", inversedBy="entretiens")
     * @ORM\JoinColumn(name="vehicule_id", referencedColumnName="id")
     */
    private $vehicule;

    /**
     * @var
     * @ORM\Column(name="prochaine_date", type="date", nullable=true)
     */
    private $prochaineDate;

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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Entretien
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set kilometrage
     *
     * @param integer $kilometrage
     *
     * @return Entretien
     */
    public function setKilometrage($kilometrage)
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    /**
     * Get kilometrage
     *
     * @return integer
     */
    public function getKilometrage()
    {
        return $this->kilometrage;
    }

    /**
     * Set total
     *
     * @param float $total
     *
     * @return Entretien
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lignesFacture = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set type
     *
     * @param \Id4v\Bundle\CarcheckBundle\Entity\TypeEntretien $type
     *
     * @return Entretien
     */
    public function setType(\Id4v\Bundle\CarcheckBundle\Entity\TypeEntretien $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Id4v\Bundle\CarcheckBundle\Entity\TypeEntretien
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add lignesFacture
     *
     * @param \Id4v\Bundle\CarcheckBundle\Entity\LigneEntretien $lignesFacture
     *
     * @return Entretien
     */
    public function addLignesFacture(\Id4v\Bundle\CarcheckBundle\Entity\LigneEntretien $lignesFacture)
    {
        if($lignesFacture->getPrix()!=0 && $lignesFacture->getQte()!=0) {
            $lignesFacture->setEntretien($this);
            $this->lignesFacture[] = $lignesFacture;
        }
        return $this;
    }

    /**
     * Remove lignesFacture
     *
     * @param \Id4v\Bundle\CarcheckBundle\Entity\LigneEntretien $lignesFacture
     */
    public function removeLignesFacture(\Id4v\Bundle\CarcheckBundle\Entity\LigneEntretien $lignesFacture)
    {
        $this->lignesFacture->removeElement($lignesFacture);
    }

    /**
     * Get lignesFacture
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLignesFacture()
    {
        return $this->lignesFacture;
    }

    /**
     * Set vehicule
     *
     * @param \Id4v\Bundle\CarcheckBundle\Entity\Vehicule $vehicule
     *
     * @return Entretien
     */
    public function setVehicule(\Id4v\Bundle\CarcheckBundle\Entity\Vehicule $vehicule = null)
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    /**
     * Get vehicule
     *
     * @return \Id4v\Bundle\CarcheckBundle\Entity\Vehicule
     */
    public function getVehicule()
    {
        return $this->vehicule;
    }

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
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preSave()
    {
        $this->calculeTotal();
        $this->calculeProchaineDate();

    }


    /**
     * Set prochaineDate
     *
     * @param \DateTime $prochaineDate
     *
     * @return Entretien
     */
    public function setProchaineDate($prochaineDate)
    {
        $this->prochaineDate = $prochaineDate;

        return $this;
    }

    /**
     * Get prochaineDate
     *
     * @return \DateTime
     */
    public function getProchaineDate()
    {
        return $this->prochaineDate;
    }
}
