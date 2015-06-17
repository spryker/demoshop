<?php

namespace Pyz\Yves\Checkout\Communication\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class Checkout
 * @package Pyz\Yves\Checkout\Communication\Form
 */
class Checkout extends AbstractType
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'checkout';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'text', [
                //'constraints' => new Email(),
                'required' => false,
                'attr' => [
                    'class' => 'padded js-checkout-email',
                    'placeholder' => 'Email-Adresse'
                ],
            ])
            ->add('billing_address', new Address(), [
                'data_class' => 'Generated\Shared\Transfer\CustomerAddressTransfer',
                'error_bubbling' => true,
                'attr' => [
                    'class' => 'js-invoice-address',
                    'style' => 'display: block;'
                ]
            ])
            ->add('shipping_address', new Address(), [
                'data_class' => 'Generated\Shared\Transfer\CustomerAddressTransfer',
                'required' => false,
                'attr' => [
                    'class' => 'js-delivery-address'
                ]
            ])
            ->add('payment_method', 'choice', [
                'choices' => ['prepay' => 'Vorkasse', 'paypal' => 'PayPal', 'creditcard' => 'Kreditkarte'],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'empty_value' => false,
                'attr' => [
                    'style' => 'display: block;'
                ]
            ])
            ->add('terms', 'checkbox', [
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'class' => 'padded confirm__agb js-confirm-agb'
                ]
            ])
            ->add('submit', 'submit', [
                'label' => 'checkout.review.submit',
                'attr' => [
                    'class' => 'cta confirm__submit js-checkout-submit'
                ]
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Generated\Shared\Transfer\CheckoutTransfer',
        ));
    }
}