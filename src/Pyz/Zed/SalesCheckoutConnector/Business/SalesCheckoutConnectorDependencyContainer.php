<?php

namespace Pyz\Zed\SalesCheckoutConnector\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\SalesCheckoutConnectorBusiness;
use Pyz\Zed\SalesCheckoutConnector\SalesCheckoutConnectorDependencyProvider;
use SprykerFeature\Zed\SalesCheckoutConnector\Business\SalesCheckoutConnectorDependencyContainer as SprykerSalesCheckoutConnectorDependencyContainer;

/**
 * @method SalesCheckoutConnectorBusiness getFactory()
 */
class SalesCheckoutConnectorDependencyContainer extends SprykerSalesCheckoutConnectorDependencyContainer
{
    /**
     * @return Model\AddOnLinkCustomerToOrderInterface
     */
    public function createAddOnLinkCustomerToOrder()
    {
        return $this->getFactory()->createModelAddOnLinkCustomerToOrder(
            $this->getProvidedDependency(SalesCheckoutConnectorDependencyProvider::FACADE_SALES)
        );
    }

}
