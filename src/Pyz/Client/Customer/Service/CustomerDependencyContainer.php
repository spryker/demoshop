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

}
