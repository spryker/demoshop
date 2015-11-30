<?php

namespace Pyz\Zed\SalesCheckoutConnector\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\SalesCheckoutConnectorBusiness;
use Pyz\Zed\SalesCheckoutConnector\SalesCheckoutConnectorDependencyProvider;
use Pyz\Zed\SalesCheckoutConnector\Business\Model\LinkCustomerToOrderInterface;
use PavFeature\Zed\SalesCheckoutConnector\Business\SalesCheckoutConnectorDependencyContainer as PavFeatureSalesCheckoutConnectorDependencyContainer;

/**
 * @method SalesCheckoutConnectorBusiness getFactory()
 */
class SalesCheckoutConnectorDependencyContainer extends PavFeatureSalesCheckoutConnectorDependencyContainer
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
