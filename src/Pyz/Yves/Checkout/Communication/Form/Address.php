<?php

namespace Pyz\Yves\Checkout\Communication\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class Address extends AbstractType
{

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
            ->add('first_name', 'text', [
//                'constraints' => [
//                    new Assert\NotBlank(),
//                ],
                'label' => false,
                'required' => false,
                'attr' => [
                    'tabindex' => 10 + $this->offset,
                    'class' => 'padded js-checkout-name',
                    'placeholder' => 'Vorname',
                    'style' => 'width: 24%; float: left;',
                ],
            ])
            ->add('last_name', 'text', [
//                'constraints' => [
//                    new Assert\NotBlank(),
//                ],
                'label' => false,
                'required' => false,
                'attr' => [
                    'tabindex' => 20 + $this->offset,
                    'class' => 'padded js-checkout-name',
                    'placeholder' => 'Name',
                    'style' => 'width: 24%; float: right; margin-right: 50%; clear: none',
                ],
            ])
            ->add('street_nr', 'text', [
//                'constraints' => [
//                    new Assert\NotBlank()
//                ],
                'label' => false,
                'required' => false,
                'property_path' => 'address2',
                'attr' => [
                    'tabindex' => 40 + $this->offset,
                    'class' => 'padded js-checkout-name',
                    'placeholder' => 'Nummer',
                    'style' => 'float: right; margin-right: 50%; width: 13%;',
                ],
            ])
            ->add('street', 'text', [
//                'constraints' => [
//                    new Assert\NotBlank()
//                ],
                'label' => false,
                'required' => false,
                'property_path' => 'address1',
                'attr' => [
                    'tabindex' => 30 + $this->offset,
                    'class' => 'padded js-checkout-name',
                    'placeholder' => 'Straße',
                    'style' => 'width: 35%; float: left;',
                ],
            ])
            ->add('city', 'text', [
//                'constraints' => [
//                    new Assert\NotBlank()
//                ],
                'label' => false,
                'required' => false,
                'attr' => [
                    'tabindex' => 60 + $this->offset,
                    'class' => 'padded js-checkout-name',
                    'placeholder' => 'Stadt',
                    'style' => 'width: 38%; float: right; margin-right: 50%;',
                ],
            ])
            ->add('zip_code', 'text', [
//                'constraints' => [
//                    new Assert\NotBlank()
//                ],
                'label' => false,
                'required' => false,
                'attr' => [
                    'tabindex' => 50 + $this->offset,
                    'class' => 'padded js-checkout-name',
                    'placeholder' => 'PLZ',
                    'style' => 'width: 10%;',
                ],
            ])
            ->add('iso2code', 'hidden', [
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
