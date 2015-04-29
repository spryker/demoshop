<?php

namespace Pyz\Yves\Sales;

use SprykerFeature\Shared\Payment\Transfer\PaymentMethodCollection;
use Pyz\Yves\Sales\Form\BillingAddressType;
use Pyz\Yves\Sales\Form\OrderType;
use Pyz\Yves\Sales\Form\ShippingAddressType;
use SprykerEngine\Yves\Kernel\AbstractDependencyContainer;

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
            $this->createBillingAddressTypeForm(),
            $this->createShippingAddressTypeForm()
        );
    }

    /**
     * @return BillingAddressType
     */
    protected function createBillingAddressTypeForm()
    {
        return $this->getFactory()->create('Form\\BillingAddressType');
    }

    /**
     * @return ShippingAddressType
     */
    protected function createShippingAddressTypeForm()
    {
        return $this->getFactory()->create('Form\\ShippingAddressType');
    }
}
