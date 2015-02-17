<?php

namespace Pyz\Yves\Payment;

use ProjectA\Shared\Payment\Transfer\PaymentMethodCollection;
use Pyz\Yves\Payment\Form\CreditCard;
use Pyz\Yves\Payment\Form\DirectDebit;
use Pyz\Yves\Payment\Form\PaymentType;
use SprykerCore\Yves\Kernel\AbstractDependencyContainer;

/**
 * Class PaymentDependencyContainer
 * @package Pyz\Yves\Payment
 */
class PaymentDependencyContainer extends AbstractDependencyContainer
{

    /**
     * @param PaymentMethodCollection $paymentMethods
     * @return PaymentType
     */
    public function createPaymentTypeForm(PaymentMethodCollection $paymentMethods)
    {
        return $this->factory->create(
            'Form\\PaymentType',
            $paymentMethods
        );
    }

    /**
     * @param PaymentMethodCollection $paymentMethods
     * @return CreditCard
     */
    public function createCreditCardTypeFrom(PaymentMethodCollection $paymentMethods)
    {
        return $this->factory->create(
            'Form\\CreditCard',
            $paymentMethods
        );
    }

    /**
     * @param PaymentMethodCollection $paymentMethods
     * @return DirectDebit
     */
    public function createDirectDebitTypeFrom(PaymentMethodCollection $paymentMethods)
    {
        return $this->factory->create(
            'Form\\DirectDebit',
            $paymentMethods
        );
    }
}