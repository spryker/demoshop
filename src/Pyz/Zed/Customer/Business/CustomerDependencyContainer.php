<?php

namespace Pyz\Zed\Customer\Business;

use SprykerFeature\Zed\Customer\Business\CustomerDependencyContainer as SpyCustomerDependencyContainer;
use Generated\Zed\Ide\FactoryAutoCompletion\CustomerBusiness;
use Pyz\Zed\Customer\Persistence\CustomerQueryContainerInterface;
use Pyz\Zed\Customer\Business\Model\MagentoPasswordManagerInterface;
use Pyz\Zed\Customer\Business\Customer\CustomerInterface;
use Pyz\Zed\Customer\Business\Customer\Customer;
use SprykerFeature\Zed\Customer\Business\CustomerDependencyContainer as SprykerFeatureCustomerDependencyContainer;

/**
 * @method CustomerBusiness getFactory()
 * @method CustomerQueryContainerInterface getQueryContainer()
 */
class CustomerDependencyContainer extends SpyCustomerDependencyContainer
{
    /**
     * @return MagentoPasswordManagerInterface
     */
    public function createMagentoPasswordManager()
    {
        return $this->getFactory()->createModelMagentoPasswordManager(
            $this->createCustomerModel(),
            $this->getQueryContainer()
        );
    }

    /**
     * @return CustomerInterface
     */
    public function createCustomerModel()
    {
        return parent::createCustomer();
    }
}
