<?php

namespace Id4v\Bundle\CarcheckBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Id4v\Bundle\CarcheckBundle\Entity\Vehicule;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("name",TextType::class)
            ->add("kilometrage")
            ->add("immatriculation",TextType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            "data_class"=>Vehicule::class
        ));
    }

    public function getName()
    {
        return 'vehicule';
    }
}
