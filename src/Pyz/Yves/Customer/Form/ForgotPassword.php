<?php

namespace Pyz\Yves\Customer\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ForgotPassword extends AbstractType
{

    /**
     * @return string
     */
    public function getName()
    {
        return 'forgotForm';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', [
                'label' => 'customer.forgot.email',
            ])
            ->add('submit', 'submit', [
                'label' => 'customer.forgot.submit',
            ])
        ;
    }

}
