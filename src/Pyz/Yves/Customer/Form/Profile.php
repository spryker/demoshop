<?php

namespace Pyz\Yves\Customer\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class Profile extends AbstractType
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'profileForm';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('salutation', 'choice', [
                'choices' => ['Mr', 'Mrs', 'Dr'],
                'label' => 'profile.form.salutation',
            ])
            ->add('first_name', 'text', [
                'label' => 'customer.profile.first_name',
                'required' => false,
            ])
            ->add('middle_name', 'text', [
                'label' => 'customer.profile.middle_name',
                'required' => false,
            ])
            ->add('last_name', 'text', [
                'label' => 'customer.profile.last_name',
                'required' => false,
            ])
            ->add('company', 'text', [
                'label' => 'customer.profile.company',
                'required' => false,
            ])
            ->add('date_of_birth', 'birthday', [
                'label' => 'customer.profile.date_of_birth',
                'required' => false,
            ])
            ->add('submit', 'submit', [
                'label' => 'customer.profile.submit'
            ])
        ;
    }
}
