<?php

namespace Pyz\Yves\Sales;

use ProjectA\Shared\Payment\Transfer\PaymentMethodCollection;
use Pyz\Yves\Sales\Form\OrderType;
use SprykerCore\Yves\Kernel\AbstractPlugin;

/**
 * Class OrderFormPlugin
 * @package Pyz\Yves\Sales
 */
class OrderTypeFormPlugin extends AbstractPlugin
{
    /**
     * @param PaymentMethodCollection $paymentMethods
     * @return OrderType
     */
    public function createOrderTypeForm(PaymentMethodCollection $paymentMethods)
    {
        return $this->dependencyContainer->createOrderTypeForm($paymentMethods);
    }
}
