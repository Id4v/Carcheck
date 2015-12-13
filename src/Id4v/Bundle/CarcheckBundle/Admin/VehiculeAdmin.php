<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 13/11/15
 * Time: 10:59
 */

namespace Id4v\Bundle\CarcheckBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class VehiculeAdmin extends Admin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form->add("name")
            ->add("kilometrage")
            ->add("immatriculation");
    }

    protected function configureListFields(ListMapper $list)
    {
       $list->addIdentifier("name")
           ->addIdentifier("immatriculation")
           ->add("kilometrage");

    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add("name")
            ->add("kilometrage");
    }


}