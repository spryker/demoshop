<?php

namespace Pyz\Yves\Checkout\Communication\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class AddressType extends AbstractType
{

    const FIELD_SALUTATION = 'salutation';
    const FIELD_FIRST_NAME = 'first_name';
    const FIELD_LAST_NAME = 'last_name';
    const FIELD_STREET = 'street';
    const FIELD_STREET_NR = 'street_nr';
    const FIELD_CITY = 'city';
    const FIELD_ZIP_CODE = 'zip_code';
    const FIELD_ISO_2_CODE = 'iso2code';

    /**
     * @var int
     */
    protected $offset = 0;

    /**
     * @param int $offset
     */
    public function __construct($offset = 0)
    {
        $this->offset = $offset;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'checkoutAddressForm';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(self::FIELD_SALUTATION, 'choice', [
                'choices' => [
                    'Mr' => 'customer.salutation.mr',
                    'Mrs' => 'customer.salutation.mrs',
                ],
                'label' => false,
                'required' => false,
                'expanded' => false,
                'multiple' => false,
                'empty_value' => false,
                'attr' => [
                    'tabindex' => 10 + $this->offset,
                    'style' => 'width: 49%; float: right; height: 65px; border: solid 1px #c3bec2;',
                ],
            ])
            ->add(self::FIELD_FIRST_NAME, 'text', [
//                'constraints' => [
//                    new Assert\NotBlank(),
//                ],
                'label' => false,
                'required' => false,
                'attr' => [
                    'tabindex' => 11 + $this->offset,
                    'class' => 'padded js-checkout-name',
                    'placeholder' => 'customer.first_name',
                    'style' => 'width: 49%; float: left;',
                ],
            ])
            ->add(self::FIELD_LAST_NAME, 'text', [
//                'constraints' => [
//                    new Assert\NotBlank(),
//                ],
                'label' => false,
                'required' => false,
                'attr' => [
                    'tabindex' => 12 + $this->offset,
                    'class' => 'padded js-checkout-name',
                    'placeholder' => 'customer.last_name',
                    'style' => 'width: 49%; clear: none; float: right;',
                ],
            ])
            ->add(self::FIELD_STREET, 'text', [
//                'constraints' => [
//                    new Assert\NotBlank()
//                ],
                'label' => false,
                'required' => false,
                'property_path' => 'address1',
                'attr' => [
                    'tabindex' => 13 + $this->offset,
                    'class' => 'padded js-checkout-name',
                    'placeholder' => 'address.street',
                    'style' => 'width: 49%; float: left;',
                ],
            ])
            ->add(self::FIELD_STREET_NR, 'text', [
//                'constraints' => [
//                    new Assert\NotBlank()
//                ],
                'label' => false,
                'required' => false,
                'property_path' => 'address2',
                'attr' => [
                    'tabindex' => 14 + $this->offset,
                    'class' => 'padded js-checkout-name',
                    'placeholder' => 'address.street_nr',
                    'style' => 'width: 49%; float: right;  clear: none;',
                ],
            ])
            ->add(self::FIELD_ZIP_CODE, 'text', [
//                'constraints' => [
//                    new Assert\NotBlank()
//                ],
                'label' => false,
                'required' => false,
                'attr' => [
                    'tabindex' => 15 + $this->offset,
                    'class' => 'padded js-checkout-name',
                    'placeholder' => 'address.zip_code',
                    'style' => 'width: 49%; float: left;',
                ],
            ])
            ->add(self::FIELD_CITY, 'text', [
//                'constraints' => [
//                    new Assert\NotBlank()
//                ],
                'label' => false,
                'required' => false,
                'attr' => [
                    'tabindex' => 16 + $this->offset,
                    'class' => 'padded js-checkout-name',
                    'placeholder' => 'address.city',
                    'style' => 'width: 49%; float: right; clear: none;',
                ],
            ])
            ->add(self::FIELD_ISO_2_CODE, 'hidden', [
                'data' => 'DE',
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Generated\Shared\Transfer\CustomerAddressTransfer',
        ]);
    }

}
