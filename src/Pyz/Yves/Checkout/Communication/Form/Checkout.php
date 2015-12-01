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
                'required' => true,
                'label' => 'E-Mail-Adresse',
                'attr' => [
                    'class' => 'input--1-1',
                ],
            ])
            ->add('billing_address', new Address(200), [
                'data_class' => 'Generated\Shared\Transfer\AddressTransfer',
                'error_bubbling' => true,
                'attr' => [
                    'class' => 'js-invoice-address',
                ],
            ])
            ->add('shipping_address', new Address(300, 'different-delivery-address'), [
                'data_class' => 'Generated\Shared\Transfer\AddressTransfer',
                'required' => false,
                'attr' => [
                    'class' => 'js-delivery-address',
                ],
            ])
            ->add('adyen_payment', new AdyenPayment($this->paymentMethodsTransfer), [
                'data_class' => 'Generated\Shared\Transfer\AdyenPaymentTransfer',
                'error_bubbling' => true,
                'label' => false,
                'attr' => [
                    'class' => 'payment-options',
                ],
            ])

            // TODO: backend functionality for newsletter subscription
            // ->add('newsletter', 'checkbox', [
            //     'label' => '**Abonnieren Sie unseren Newsletter**
            //     Ja, ich möchte hilfreiche Tipps für mein Haustier erhalten und über Aktionen & Gutscheine per E-Mail informiert werden. Abmeldung jederzeit möglich.',
            //     'required' => false,
            //     'mapped' => false,
            //     'attr' => [
            //         'tabindex' => 400,
            //         'class' => 'checkbox--large checkbox--right',
            //     ],
            // ])
            ->add('terms', 'checkbox', [
                'label' => 'Ich habe die Allgemeinen Geschäftsbedingungen gelesen und stimme diesen ausdrücklich zu',
                'required' => true,
                'mapped' => false,
                'attr' => [
                    'tabindex' => 400,
                    'class' => 'checkbox--large checkbox--right',
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
