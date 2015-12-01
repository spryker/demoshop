<?php

namespace Pyz\Yves\Checkout\Communication\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Generated\Shared\Adyen\AdyenPaymentMethodsInterface;
use Generated\Shared\Adyen\AdyenPaymentMethodInterface;

class AdyenPayment extends AbstractType
{

    /**
     * @var AdyenPaymentMethodsInterface[]
     */
    private $availablePaymentMethods = [];

    /**
     * @param AdyenPaymentMethodsInterface $paymentMethodsTransfer
     */
    public function __construct(AdyenPaymentMethodsInterface $paymentMethodsTransfer)
    {
        $this->availablePaymentMethods = $paymentMethodsTransfer;
    }

    /**
     * @return AdyenPaymentMethodInterface[]
     */
    protected function getAvailablePaymentMethods()
    {
        return $this->availablePaymentMethods->getPaymentMethods();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'adyenPayment';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('payment_method', 'choice', [
                'choices' => $this->extractPaymentMethods(),
                'expanded' => true,
                'multiple' => false,
                'required' => true,
                'empty_value' => false,
                'label' => false,
                'attr' => [
                ],
            ])
            ->add('payment_detail', new PaymentDetail(), [
                'data_class' => 'Generated\Shared\Transfer\AdyenPaymentDetailTransfer',
                'error_bubbling' => true,
                'mapped' => true,
                'label' => false,
                'attr' => [
                    'class' => 'payment-options',
                ],
            ])
            ;
    }

    /**
     * @return array
     */
    public function extractPaymentMethods()
    {
        $paymentMethods = [];
        foreach($this->getAvailablePaymentMethods() as $paymentMethodTransfer) {
            $key = $paymentMethodTransfer->getKey();
            $paymentMethods[] = [$key => $key];
        }
        return $paymentMethods;
    }

}
