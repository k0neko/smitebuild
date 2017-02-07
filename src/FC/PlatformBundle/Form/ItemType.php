<?php

namespace FC\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ItemType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ["attr"=>["class"=>"form-control"]])
            ->add('type', TextType::class, ["attr"=>["class"=>"form-control"]])
            ->add('attackSpeed', IntegerType::class, ["attr"=>["class"=>"form-control"]])
            ->add('power', IntegerType::class, ["attr"=>["class"=>"form-control"]])
            ->add('protection', IntegerType::class, ["attr"=>["class"=>"form-control"]])
            ->add('healt', IntegerType::class, ["attr"=>["class"=>"form-control"]])
            ->add('movementSpeed', IntegerType::class, ["attr"=>["class"=>"form-control"]])
            ->add('lifesteal', IntegerType::class, ["attr"=>["class"=>"form-control"]])
            ->add('mana', IntegerType::class, ["attr"=>["class"=>"form-control"]])
            ->add('penetration', IntegerType::class, ["attr"=>["class"=>"form-control"]])
            ->add('criticalStrikeChance',IntegerType::class, ["attr"=>["class"=>"form-control"]])
            ->add('cooldownReduction', IntegerType::class, ["attr"=>["class"=>"form-control"]])
            ->add('controlReduction', IntegerType::class, ["attr"=>["class"=>"form-control"]])

            ->add('submit', SubmitType::class, array(
                "attr"=>["class"=>"btn btn-primary"]
            ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FC\PlatformBundle\Entity\Item'
        ));
    }
}