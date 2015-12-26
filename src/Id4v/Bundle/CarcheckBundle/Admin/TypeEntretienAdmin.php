<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 13/11/15
 * Time: 18:23
 */

namespace Id4v\Bundle\CarcheckBundle\Admin;

use Id4v\Bundle\CarcheckBundle\Entity\Periode;
use Id4v\Bundle\CarcheckBundle\Entity\TypeEntretien;
use Id4v\Bundle\CarcheckBundle\Form\Type\PeriodeType;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class TypeEntretienAdmin extends Admin
{
    protected $datagridValues = array(

        // name of the ordered field (default = the model's id field, if any)
        '_sort_by' => 'name',
    );


    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add("name")
            ->add("periodes",CollectionType::class,array(
                "entry_type"=>PeriodeType::class,
                "allow_add"=>true,
                "by_reference"=>false,
                'allow_delete' => true
            ))

        ;

    }

    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier("name")
        ->add("periodeNumber",NumberType::class,array(
            "label"=>"Nombre de périodes définies"
        ));
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add("name");
    }

    /**
     * @param TypeEntretien $object
     */
    public function prePersist($object)
    {
        /** @var Periode $periode */
        foreach ($object->getPeriodes() as $periode) {
            $periode->setTypeEntretien($object);
        }
    }

    public function preUpdate($object)
    {
        /** @var Periode $periode */
        foreach ($object->getPeriodes() as $periode) {
            $periode->setTypeEntretien($object);
        }
    }

}