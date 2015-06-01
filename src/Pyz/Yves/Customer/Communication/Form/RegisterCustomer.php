<?php

namespace Pyz\Yves\Customer\Communication\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegisterCustomer extends AbstractType
{

    /**
     * @return string
     */
    public function getName()
    {
        return 'registerForm';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'text', [
                'label' => 'customer.register.email',
                'constraints' => new NotBlank(),
            ])
            ->add('password', 'password', [
                'label' => 'customer.register.password',
                'constraints' => new NotBlank(),
            ])
            ->add('submit', 'submit', [
                'label' => 'customer.register.submit',
            ])
        ;
    }

}
