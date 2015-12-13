<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 07/12/15
 * Time: 16:59
 */

namespace Id4v\Bundle\CarcheckBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as Mongo;

/**
 * Class Periode
 * @package Id4v\Bundle\CarcheckBundle\Document
 *
 * @Mongo\Document()
 */
class Periode
{
    /**
     * @var
     * @Mongo\Id()
     */
    protected $id;

    /**
     * @var
     * @Mongo\String()
     */
    protected $type;

    /**
     * @var
     * @Mongo\Integer()
     */
    protected $value;

    /**
     * @var
     * @Mongo\EmbedOne(targetDocument="TypeEntretien")
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
     * @param Id4v\Bundle\CarcheckBundle\Document\TypeEntretien $typeEntretien
     * @return self
     */
    public function setTypeEntretien(\Id4v\Bundle\CarcheckBundle\Document\TypeEntretien $typeEntretien)
    {
        $this->typeEntretien = $typeEntretien;
        return $this;
    }

    /**
     * Get typeEntretien
     *
     * @return Id4v\Bundle\CarcheckBundle\Document\TypeEntretien $typeEntretien
     */
    public function getTypeEntretien()
    {
        return $this->typeEntretien;
    }
}
