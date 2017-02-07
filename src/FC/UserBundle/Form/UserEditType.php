<?php
/**
 * Created by PhpStorm.
 * User: Fanny
 * Date: 10-01-17
 * Time: 11:22
 */

namespace FC\UserBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->remove('date');
    }

    public function getParent()
    {
        return UserType::class;
    }
}