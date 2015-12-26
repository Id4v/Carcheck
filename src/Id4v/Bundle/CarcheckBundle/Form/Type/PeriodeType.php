<?php

namespace Id4v\Bundle\CarcheckBundle\Form\Type;

use Id4v\Bundle\CarcheckBundle\Entity\Periode;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PeriodeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("type",ChoiceType::class,array(
                "label"=>"Périodicité",
                "choices"=>array(
                    "Années"=>Periode::TYPE_ANNEE,
                    "Kilomètres"=>Periode::TYPE_KM
                )
            ))
            ->add("value");
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault("data_class",Periode::class);
    }

    public function getName()
    {
        return 'id4v_carcheck_bundle_periode_type';
    }
}
