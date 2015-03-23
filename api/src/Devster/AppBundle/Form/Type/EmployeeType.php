<?php
/**
 * Created by PhpStorm.
 * User: fonpah
 * Date: 22.03.2015
 * Time: 13:22
 */

namespace Devster\AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class EmployeeType
 * @package Devster\AppBundle\Form\Type
 */
class EmployeeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'username',
                null,
                [
                    'label' => 'Username',
                    'attr' => [
                        'placeholder' => 'Username'
                    ]
                ]
            )
            ->add(
                'email',
                null,
                [
                    'label' => 'E-Mail',
                    'attr' => [
                        'placeholder' => 'Email Address'
                    ]
                ]
            )
            ->add(
                'email',
                null,
                [
                    'label' => 'Password',
                    'attr' => [
                        'placeholder' => 'Password'
                    ]
                ]
            );
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Devster\AppBundle\Entity\Employee', 'csrf_protection' => false
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'employee';
    }
}