<?php

namespace Pyz\Yves\Payment;

use ProjectA\Shared\Payment\Transfer\PaymentMethodCollection;
use Pyz\Yves\Payment\Form\DirectDebit;
use SprykerCore\Yves\Kernel\AbstractPlugin;

/**
 * Class DirectDebitFormPlugin
 * @package Pyz\Yves\Payment
 */
class DirectDebitFormPlugin extends AbstractPlugin
{
    /**
     * @param PaymentMethodCollection $paymentMethods
     * @return DirectDebit
     */
    public function createDirectDebitTypeForm(PaymentMethodCollection $paymentMethods)
    {
        return $this->dependencyContainer->createDirectDebitTypeForm($paymentMethods);
    }
}
