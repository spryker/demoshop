<?php

namespace Pyz\Yves\Sales;

use ProjectA\Shared\Payment\Transfer\PaymentMethodCollection;
use Pyz\Yves\Sales\Form\BillingAddressType;
use Pyz\Yves\Sales\Form\OrderType;
use Pyz\Yves\Sales\Form\ShippingAddressType;
use SprykerCore\Yves\Kernel\Communication\AbstractDependencyContainer;

/**
 * Class SalesDependencyContainer
 * @package Pyz\Yves\Sales
 */
class SalesDependencyContainer extends AbstractDependencyContainer
{
    /**
     * @param PaymentMethodCollection $paymentMethods
     * @return OrderType
     */
    public function createOrderTypeForm(PaymentMethodCollection $paymentMethods)
    {
        return $this->factory->create(
            'Form\\OrderType',
            $this->createBillingAddressTypeForm(),
            $this->createShippingAddressTypeForm(),
            $this->locator->payment()->pluginPaymentTypeForm()->createPaymentTypeForm($paymentMethods),
            $this->locator
        );
    }

    /**
     * @return BillingAddressType
     */
    protected function createBillingAddressTypeForm()
    {
        return $this->factory->create('Form\\BillingAddressType', $this->locator);
    }

    /**
     * @return ShippingAddressType
     */
    protected function createShippingAddressTypeForm()
    {
        return $this->factory->create('Form\\ShippingAddressType', $this->locator);
    }
}
