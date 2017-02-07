<?php

namespace FC\PlatformBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class BuildType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('god', EntityType::class,array (
                'class' => 'FCPlatformBundle:God',
                'choice_label' => 'name',
                'choices_as_values' => true,
                "attr"=>["class"=>"form-control",'data-select' => 'true'],
                
            ))
            ->add('buildName', TextType::class, ["attr"=>["class"=>"form-control"]])
            ->add('item1', EntityType::class,array (
                'class' => 'FCPlatformBundle:Item',
                'choice_label' => 'name',
                'multiple' => false,
                "attr"=>["class"=>"form-control"]
            ))
            ->add('item2', EntityType::class,array (
                'class' => 'FCPlatformBundle:Item',
                'choice_label' => 'name',
                'multiple' => false,
                "attr"=>["class"=>"form-control"]
            ))
            ->add('item3', EntityType::class,array (
                'class' => 'FCPlatformBundle:Item',
                'choice_label' => 'name',
                'multiple' => false,
                "attr"=>["class"=>"form-control"]
            ))
            ->add('item4', EntityType::class,array (
                'class' => 'FCPlatformBundle:Item',
                'choice_label' => 'name',
                'multiple' => false,
                "attr"=>["class"=>"form-control"]
            ))
            ->add('item5', EntityType::class,array (
                'class' => 'FCPlatformBundle:Item',
                'choice_label' => 'name',
                'multiple' => false,
                "attr"=>["class"=>"form-control"]
            ))
            ->add('item6', EntityType::class,array (
                'class' => 'FCPlatformBundle:Item',
                'choice_label' => 'name',
                'multiple' => false,
                "attr"=>["class"=>"form-control"]
            ))
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
            'data_class' => 'FC\PlatformBundle\Entity\Build'
        ));
    }
}
