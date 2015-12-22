<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 13/11/15
 * Time: 18:23
 */

namespace Id4v\Bundle\CarcheckBundle\Admin;


use Id4v\Bundle\CarcheckBundle\Entity\TypeEntretien;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TypeEntretienAdmin extends Admin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form->add("name")
            ->add("periode")
            ->add("typePeriode",ChoiceType::class,array(
                "required"=>false,
                "empty_data"=>null,
                "choices"=>array(
                    TypeEntretien::TYPE_ANNEE=>"Année",
                    TypeEntretien::TYPE_KM=>"Km"
                )
            ))
        ;

    }

    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier("name");
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add("name");
    }


}