<?php

namespace Pyz\Yves\Customer\Communication\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class Address extends AbstractType
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
                'label' => 'customer.address.salutation',
            ])
            ->add('name', 'text', [
                'label' => 'customer.address.name',
                'required' => false,
            ])
            ->add('address1', 'text', [
                'label' => 'customer.address.address1',
                'required' => false,
            ])
            ->add('address2', 'text', [
                'label' => 'customer.address.address2',
                'required' => false,
            ])
            ->add('address3', 'text', [
                'label' => 'customer.address.address3',
                'required' => false,
            ])
            ->add('company', 'text', [
                'label' => 'customer.address.company',
                'required' => false,
            ])
            ->add('city', 'text', [
                'label' => 'customer.address.city',
                'required' => false,
            ])
            ->add('zip_code', 'text', [
                'label' => 'customer.address.zip_code',
                'required' => false,
            ])
            ->add('po_box', 'text', [
                'label' => 'customer.address.po_box',
                'required' => false,
            ])
            ->add('phone', 'text', [
                'label' => 'customer.address.phone',
                'required' => false,
            ])
            ->add('cell_phone', 'text', [
                'label' => 'customer.address.cell_phone',
                'required' => false,
            ])
            ->add('comment', 'text', [
                'label' => 'customer.address.comment',
                'required' => false,
            ])
            ->add('submit', 'submit', [
                'label' => 'customer.address.submit',
            ])
        ;
    }

}
