<?php

namespace Pyz\Yves\Checkout\Communication\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AdyenPayment extends AbstractType
{

    /**
     * @return string
     */
    public function getName()
    {
        return 'sepaPaymentForm';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('payment_method', 'choice', [
                'choices' => [
                    'adyen.payment.method.sepa.directdebit' => 'HardCoded SEPA A. Schneider (usable)',
                    'adyen.payment.method.paypal' => 'PayPal (usable)',
                    'adyen.payment.method.creditcard.cse' => 'Credit card (not usable - you need token)',
                    'adyen.payment.method.german.bank.transfer' => 'Prepayment (usable)'
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'empty_value' => false,
                'attr' => [
                    'style' => 'display: block;',
                ],
            ])
            ->add('payment_detail', new SepaPayment(), [
                'data_class' => 'Generated\Shared\Transfer\AdyenPaymentDetailTransfer',
                'error_bubbling' => true,
                'mapped' => true,
                'attr' => [
                    'class' => 'payment-options',
                    'style' => 'display: block;',
                ],
            ])
            ;
    }
}
