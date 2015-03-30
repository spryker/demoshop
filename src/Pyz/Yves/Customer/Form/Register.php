<?php

namespace Pyz\Yves\Customer\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class Register extends AbstractType
{
    public function getName()
    {
        return "registerForm";
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'text', [
                'label' => 'customer.register.email',
                'constraints' => [new NotBlank()]
            ])
            ->add('password', 'password', [
                'label' => 'customer.register.password',
                'constraints' => [new NotBlank()]
            ])
            ->add('submit', 'submit', [
                'label' => 'customer.register.submit'
            ])
        ;
    }
}