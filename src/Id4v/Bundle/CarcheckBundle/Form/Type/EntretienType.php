<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 13/11/15
 * Time: 14:43
 */

namespace Id4v\Bundle\CarcheckBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntretienType extends AbstractType{

    public function getName()
    {
        return "entretien";
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("date")
            ->add("kilometrage")
            ->add("type")
            ->add("lignesFacture","collection",array(
                "type"=>new LigneEntretienType(),
                "allow_add"=>true,
                "by_reference"=>false,
                'allow_delete' => true
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            "data_class"=>'Id4v\Bundle\CarcheckBundle\Document\Entretien'
        ));
    }


}