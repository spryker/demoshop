<?php

namespace Pyz\Zed\CustomerCheckoutConnector\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\CustomerCheckoutConnectorBusiness;
use Pyz\Zed\CustomerCheckoutConnector\CustomerCheckoutConnectorDependencyProvider;
use Pyz\Zed\CustomerCheckoutConnector\Business\Model\PreconditionCheckerInterface;
use SprykerFeature\Zed\CustomerCheckoutConnector\Business\CustomerCheckoutConnectorDependencyContainer as SprykerCustomerCheckoutConnectorDependencyContainer;

/**
 * @method CustomerCheckoutConnectorBusiness getFactory()
 */
class CustomerCheckoutConnectorDependencyContainer extends SprykerCustomerCheckoutConnectorDependencyContainer
{
    /**
     * @return Model\AddOnCustomerOrderHydratorInterface
     */
    public function createAddOnCustomerOrderHydrator()
    {
        return $this->getFactory()->createModelAddOnCustomerOrderHydrator();
    }

    /**
     * @return PreconditionCheckerInterface
     */
    public function createPreconditionChecker()
    {
        return $this->getFactory()->createPreconditionChecker(
            $this->getProvidedDependency(CustomerCheckoutConnectorDependencyProvider::FACADE_CUSTOMER)
        );
    }
}
