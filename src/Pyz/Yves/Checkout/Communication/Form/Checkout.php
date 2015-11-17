<?php

namespace Pyz\Yves\Checkout\Communication\Form;

use Generated\Shared\Adyen\AdyenPaymentMethodsInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Checkout extends AbstractType
{

    /**
     * @var AdyenPaymentMethodsInterface
     */
    protected $paymentMethodsTransfer;

    /**
     * @param AdyenPaymentMethodsInterface $paymentMethodsTransfer
     */
    public function __construct(
        AdyenPaymentMethodsInterface $paymentMethodsTransfer
    ){
        $this->paymentMethodsTransfer = $paymentMethodsTransfer;
    }

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
                    'tabindex' => 100,
                    'class' => 'padded js-checkout-email',
                    'placeholder' => 'Email-Adresse',
                ],
            ])
            ->add('billing_address', new Address(200), [
                'data_class' => 'Generated\Shared\Transfer\AddressTransfer',
                'error_bubbling' => true,
                'attr' => [
                    'class' => 'js-invoice-address',
                    'style' => 'display: block;',
                ],
            ])
            ->add('shipping_address', new Address(300), [
                'data_class' => 'Generated\Shared\Transfer\AddressTransfer',
                'required' => false,
                'attr' => [
                    'class' => 'js-delivery-address',
                ],
            ])
            ->add('payment_method', 'choice', [
                'choices' => ['adyen.payment.method.sepa.directdebit' => 'HardCoded SEPA (A. Schneider)'],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'empty_value' => false,
                'attr' => [
                    'style' => 'display: block;',
                ],
            ])
            ->add('terms', 'checkbox', [
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'tabindex' => 400,
                    'class' => 'padded confirm__agb js-confirm-agb',
                ],
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Generated\Shared\Transfer\CheckoutTransfer',
        ]);
    }

}
