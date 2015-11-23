<?php

namespace Pyz\Yves\Checkout\Communication\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Generated\Shared\Adyen\AdyenPaymentMethodsInterface;
use PavFeature\Shared\Adyen\AdyenPaymentMethodConstants;

class AdyenPayment extends AbstractType
{

    private $availablePaymentMethods = [];

    /**
     * @param AdyenPaymentMethodsInterface $paymentMethodsTransfer
     */
    public function __construct(AdyenPaymentMethodsInterface $paymentMethodsTransfer)
    {
        foreach ($paymentMethodsTransfer->getPaymentMethods() as $paymentMethod)
        {
            $this->availablePaymentMethods[] = $paymentMethod;
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sepaPaymentForm';
    }

    public function getAcceptedPayments()
    {
        return [
            AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_SEPA => AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_SEPA,
            AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_PAYPAL => AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_PAYPAL,
            AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_CREDIT_CARD_CSE => AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_CREDIT_CARD_CSE,
            AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_GERMAN_BANK_TRANSFER => AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_GERMAN_BANK_TRANSFER
        ];
    }

    public function getPaymentMethods()
    {
        $paymentMethods = [];
        foreach($this->getAcceptedPayments() as $paymentMethod)
        {
            if(in_array($paymentMethod, $this->availablePaymentMethods))
            {
                $paymentMethods[] = [$paymentMethod => $paymentMethod];
            }
        }
        return $paymentMethods;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('payment_method', 'choice', [
                'choices' => $this->getPaymentMethods(),
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'empty_value' => false,
                'label' => false,
                'attr' => [
                    'style' => 'display: block;',
                ],
            ])
            ->add('payment_detail', new PaymentDetail(), [
                'data_class' => 'Generated\Shared\Transfer\AdyenPaymentDetailTransfer',
                'error_bubbling' => true,
                'mapped' => true,
                'label' => false,
                'attr' => [
                    'class' => 'payment-options',
                    'style' => 'display: block;',
                ],
            ])
            ;
    }
}
