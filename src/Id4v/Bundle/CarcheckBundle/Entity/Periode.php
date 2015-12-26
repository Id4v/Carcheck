<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 07/12/15
 * Time: 16:59
 */

namespace Id4v\Bundle\CarcheckBundle\Entity;

use Doctrine\Common\Annotations\Annotation\Enum;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Periode
 * @package Id4v\Bundle\CarcheckBundle\Entity
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Periode
{
    const TYPE_ANNEE="annee";
    const TYPE_KM="km";
    /**
     * @var
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var
     * @Enum(value={"annee","km"})
     * @ORM\Column(type="string")
     */
    protected $type;

    /**
     * @var
     * @ORM\Column(type="integer", name="value")
     */
    protected $value;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Id4v\Bundle\CarcheckBundle\Entity\TypeEntretien", inversedBy="periodes", cascade={"persist"})
     */
    protected $typeEntretien;


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
     * Set type
     *
     * @param string $type
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get type
     *
     * @return string $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set value
     *
     * @param integer $value
     * @return self
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get value
     *
     * @return integer $value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set typeEntretien
     *
     * @return self
     */
    public function setTypeEntretien(\Id4v\Bundle\CarcheckBundle\Entity\TypeEntretien $typeEntretien)
    {
        $this->typeEntretien = $typeEntretien;
        return $this;
    }

    /**
     * Get typeEntretien
     *
     * @return Id4v\Bundle\CarcheckBundle\Entity\TypeEntretien $typeEntretien
     */
    public function getTypeEntretien()
    {
        return $this->typeEntretien;
    }
}
