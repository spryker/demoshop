<?php

namespace Pyz\Yves\Sales;

use Pyz\Yves\Sales\Communication\Form;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;

class SalesDependencyContainer extends AbstractCommunicationDependencyContainer
{

    /**
     * @return object
     */
    public function createOrderTypeForm()
    {
        return $this->getFactory()->createFormOrderType(
            $this->getLocator(),
            $this->createBillingAddressTypeForm(),
            $this->createShippingAddressTypeForm()
        );
    }

    /**
     * @return Form\BillingAddress
     */
    protected function createBillingAddressTypeForm()
    {
        return $this->getFactory()->createFormBillingAddressType($this->getLocator());
    }

    /**
     * @return Form\ShippingAddressType
     */
    protected function createShippingAddressTypeForm()
    {
        return $this->getFactory()->createFormShippingAddressType($this->getLocator());
    }

}
