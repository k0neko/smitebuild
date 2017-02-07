<?php

namespace FC\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FC\PlatformBundle\Form\ImageType;

class GodType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ["attr"=>["class"=>"form-control"]])
            ->add('image', ImageType::class)
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
            'data_class' => 'FC\PlatformBundle\Entity\God'
        ));
    }
}
