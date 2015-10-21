<?php

namespace Pyz\Yves\Checkout\Communication\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class AddressType extends AbstractType
{

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
            ->add(self::FIELD_FIRST_NAME, 'text', [
//                'constraints' => [
//                    new Assert\NotBlank(),
//                ],
                'label' => false,
                'required' => false,
                'attr' => [
                    'tabindex' => 10 + $this->offset,
                    'class' => 'padded js-checkout-name',
                    'placeholder' => 'customer.first_name',
                    'style' => 'width: 24%; float: left;',
                ],
            ])
            ->add(self::FIELD_LAST_NAME, 'text', [
//                'constraints' => [
//                    new Assert\NotBlank(),
//                ],
                'label' => false,
                'required' => false,
                'attr' => [
                    'tabindex' => 20 + $this->offset,
                    'class' => 'padded js-checkout-name',
                    'placeholder' => 'customer.last_name',
                    'style' => 'width: 24%; float: right; margin-right: 50%; clear: none',
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
                    'tabindex' => 30 + $this->offset,
                    'class' => 'padded js-checkout-name',
                    'placeholder' => 'address.street',
                    'style' => 'width: 35%; float: left;',
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
                    'tabindex' => 40 + $this->offset,
                    'class' => 'padded js-checkout-name',
                    'placeholder' => 'address.street_nr',
                    'style' => 'float: right; margin-right: 50%; width: 13%;',
                ],
            ])
            ->add(self::FIELD_CITY, 'text', [
//                'constraints' => [
//                    new Assert\NotBlank()
//                ],
                'label' => false,
                'required' => false,
                'attr' => [
                    'tabindex' => 60 + $this->offset,
                    'class' => 'padded js-checkout-name',
                    'placeholder' => 'address.city',
                    'style' => 'width: 38%; float: right; margin-right: 50%;',
                ],
            ])
            ->add(self::FIELD_ZIP_CODE, 'text', [
//                'constraints' => [
//                    new Assert\NotBlank()
//                ],
                'label' => false,
                'required' => false,
                'attr' => [
                    'tabindex' => 50 + $this->offset,
                    'class' => 'padded js-checkout-name',
                    'placeholder' => 'address.zip_code',
                    'style' => 'width: 10%;',
                ],
            ])
            ->add(self::FIELD_ISO_2_CODE, 'hidden', [
                'data' => 'DE',
            ])
        ;
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
