<?php

namespace FC\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, ["attr" => ["class" => "form-control"]])
            ->add('email', TextType::class, ["attr" => ["class" => "form-control"]])
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'Password', 'attr' => ["class" => "form-control"]),
                'second_options' => array('label' => 'Confirm password', 'attr' => ["class" => "form-control"]),
                'invalid_message' => 'Invalid password',))
            ->add('submit', SubmitType::class, array(
                "attr" => ["class" => "btn btn-primary"]
            ));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FC\UserBundle\Entity\User'
        ));
    }
}


