<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 13/11/15
 * Time: 19:47
 */

namespace Id4v\Bundle\CarcheckBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LigneEntretienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("designation")
            ->add("qte")
            ->add("prix");
    }


    public function getName()
    {
        return "ligne_entretien";
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            "data_class"=>'Id4v\Bundle\CarcheckBundle\Document\LigneEntretien'
        ));
    }


}