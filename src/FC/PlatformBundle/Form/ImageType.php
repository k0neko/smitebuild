<?php
/**
 * Created by PhpStorm.
 * User: Fanny
 * Date: 20-12-16
 * Time: 09:30
 */
namespace FC\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('file', FileType::class, array('label' => false))
            ->add('alt', TextType::class, ["attr"=>["class"=>"form-control"]])
            ->add('url', TextType::class, ["attr"=>["class"=>"form-control"]])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'FC\PlatformBundle\Entity\Image'
        ));
    }

}