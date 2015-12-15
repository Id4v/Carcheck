<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 13/11/15
 * Time: 14:43
 */

namespace Id4v\Bundle\CarcheckBundle\Form\Type;

use Doctrine\Bundle\MongoDBBundle\Form\Type\DocumentType;
use Id4v\Bundle\CarcheckBundle\Document\TypeEntretien;
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
        $builder->add("date",DateType::class)
            ->add("kilometrage")
            ->add("type",DocumentType::class,array(
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
            "data_class"=>'Id4v\Bundle\CarcheckBundle\Document\Entretien'
        ));
    }


}