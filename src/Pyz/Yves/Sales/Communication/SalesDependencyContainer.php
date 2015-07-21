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
        return $this->getFactory()->createFormOrder(
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
        return $this->getFactory()->createFormBillingAddress($this->getLocator());
    }

    /**
     * @return Form\ShippingAddress
     */
    protected function createShippingAddressTypeForm()
    {
        return $this->getFactory()->createFormShippingAddress($this->getLocator());
    }

}
