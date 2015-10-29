<?php

namespace Pyz\Zed\SalesCheckoutConnector\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\SalesCheckoutConnectorBusiness;
use Pyz\Zed\SalesCheckoutConnector\SalesCheckoutConnectorDependencyProvider;
use Pyz\Zed\SalesCheckoutConnector\Business\Model\LinkCustomerToOrderInterface;
use SprykerFeature\Zed\SalesCheckoutConnector\Business\SalesCheckoutConnectorDependencyContainer as SprykerSalesCheckoutConnectorDependencyContainer;

/**
 * @method SalesCheckoutConnectorBusiness getFactory()
 */
class SalesCheckoutConnectorDependencyContainer extends SprykerSalesCheckoutConnectorDependencyContainer
{
    /**
     * @return LinkCustomerToOrderInterface
     */
    public function createLinkCustomerToOrder()
    {
        return $this->getFactory()->createModelLinkCustomerToOrder(
            $this->getProvidedDependency(SalesCheckoutConnectorDependencyProvider::FACADE_SALES)
        );
    }

}
