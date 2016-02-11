<?php

namespace Pyz\Yves\Checkout\Form;

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
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
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
                    'class' => 'input_field field_right',
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
                    'class' => 'padded js-checkout-name input_field field_left',
                    'placeholder' => 'customer.first_name',
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
                    'class' => 'padded js-checkout-name input_field field_right',
                    'placeholder' => 'customer.last_name',
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
                    'class' => 'padded js-checkout-name input_field field_left',
                    'placeholder' => 'address.street',
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
                    'class' => 'padded js-checkout-name input_field field_right',
                    'placeholder' => 'address.street_nr',
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
                    'class' => 'padded js-checkout-name input_field field_left',
                    'placeholder' => 'address.zip_code',
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
                    'class' => 'padded js-checkout-name input_field field_right',
                    'placeholder' => 'address.city',
                ],
            ])
            ->add(self::FIELD_ISO_2_CODE, 'hidden', [
                'data' => 'DE',
            ]);
    }

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Generated\Shared\Transfer\CustomerAddressTransfer',
        ]);
    }

}
