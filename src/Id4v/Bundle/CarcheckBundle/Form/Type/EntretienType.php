<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 13/11/15
 * Time: 14:43
 */

namespace Id4v\Bundle\CarcheckBundle\Form\Type;

use Id4v\Bundle\CarcheckBundle\Entity\Entretien;
use Id4v\Bundle\CarcheckBundle\Entity\TypeEntretien;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


class EntretienType extends AbstractType{

    public function getName()
    {
        return "entretien";
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            "date",
            DateType::class,
            array(
                "widget"=>"single_text"
            )
            )
            ->add("kilometrage")
           ->add("type",EntityType::class,array(
                "class"=>TypeEntretien::class
            ))
            ->add("lignesFacture",CollectionType::class,array(
                "entry_type"=>LigneEntretienType::class,
                "allow_add"=>true,
                "by_reference"=>false,
                'allow_delete' => true
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            "data_class"=>Entretien::class
        ));
    }


}