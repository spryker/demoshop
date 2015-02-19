<?php

namespace Pyz\Yves\Payment;

use ProjectA\Shared\Payment\Transfer\PaymentMethodCollection;
use Pyz\Yves\Payment\Form\CreditCard;
use SprykerCore\Yves\Kernel\AbstractPlugin;

/**
 * Class CreditCardFormPlugin
 * @package Pyz\Yves\Payment
 */
class CreditCardFormPlugin extends AbstractPlugin
{
    /**
     * @param PaymentMethodCollection $paymentMethods
     * @return CreditCard
     */
    public function createCreditCardTypeForm(PaymentMethodCollection $paymentMethods)
    {
        return $this->dependencyContainer->createTypeForm($paymentMethods);
    }
}
