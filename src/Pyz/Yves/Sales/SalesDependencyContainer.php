<?php

namespace Pyz\Yves\Sales;

use ProjectA\Shared\Payment\Transfer\PaymentMethodCollection;
use Pyz\Yves\Sales\Form\BillingAddressType;
use Pyz\Yves\Sales\Form\OrderType;
use Pyz\Yves\Sales\Form\ShippingAddressType;
use SprykerCore\Yves\Kernel\AbstractDependencyContainer;

/**
 * Class SalesDependencyContainer
 * @package Pyz\Yves\Sales
 */
class SalesDependencyContainer extends AbstractDependencyContainer
{
    /**
     * @return object
     */
    public function createOrderTypeForm()
    {
        return $this->getFactory()->create(
            'Form\\OrderType',
            $this->getLocator(),
            $this->createBillingAddressTypeForm(),
            $this->createShippingAddressTypeForm()
        );
    }

    /**
     * @return BillingAddressType
     */
    protected function createBillingAddressTypeForm()
    {
        return $this->getFactory()->create('Form\\BillingAddressType', $this->getLocator());
    }

    /**
     * @return ShippingAddressType
     */
    protected function createShippingAddressTypeForm()
    {
        return $this->getFactory()->create('Form\\ShippingAddressType', $this->getLocator());
    }
}
