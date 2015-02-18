<?php

namespace Pyz\Yves\Payment;

use ProjectA\Shared\Payment\Transfer\PaymentMethodCollection;
use Pyz\Yves\Payment\Form\PaymentType;
use SprykerCore\Yves\Kernel\AbstractPlugin;

/**
 * Class PaymentTypeFormPlugin
 * @package Pyz\Yves\Payment
 */
class PaymentTypeFormPlugin extends AbstractPlugin
{
    /**
     * @param PaymentMethodCollection $paymentMethods
     * @return PaymentType
     */
    public function createPaymentTypeForm(PaymentMethodCollection $paymentMethods)
    {
        return $this->dependencyContainer->createPaymentTypeForm($paymentMethods);
    }
}
