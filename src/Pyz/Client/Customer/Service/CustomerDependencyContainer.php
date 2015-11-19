<?php

namespace Pyz\Client\Customer\Service;
use Generated\Client\Ide\FactoryAutoCompletion\CustomerService;
use Pyz\Client\Customer\Service\Session\CustomerSessionInterface;
use Pyz\Client\Customer\Service\Zed\CustomerStubInterface;
use SprykerFeature\Client\Customer\Service\CustomerDependencyContainer as SprykerFeatureCustomerDependencyContainer;

/**
 * @method CustomerService getFactory()
 * @method CustomerStubInterface createZedCustomerStub()
 * @method CustomerSessionInterface createSessionCustomerSession()
 */
class CustomerDependencyContainer extends SprykerFeatureCustomerDependencyContainer
{
    /**
     * @return CustomerStubInterface
     */
    public function createZedStub()
    {
        $zedStub = $this->getProvidedDependency(CustomerDependencyProvider::SERVICE_ZED);
        $cartStub = $this->getFactory()->createZedCustomerStub(
            $zedStub
        );

        return $cartStub;
    }

}
