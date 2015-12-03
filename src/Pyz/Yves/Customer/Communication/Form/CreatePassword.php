<?php

namespace Pyz\Yves\Customer\Communication\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CreatePassword extends AbstractType
{

    /**
     * @return string
     */
    public function getName()
    {
        return 'createForm';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('restore_key', 'hidden', [
                'required' => true
            ])
            ->add('password', 'password', [
                'label' => 'customer.password.create',
            ])
            ->add('submit', 'submit', [
                'label' => 'customer.password.submit',
            ])
            ->setAction('/password/create/')
        ;
    }

}
