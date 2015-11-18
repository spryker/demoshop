<?php

namespace Pyz\Zed\Customer\Business;

use Pyz\Zed\Customer\Business\Customer\Customer;
use SprykerFeature\Zed\Customer\Business\CustomerDependencyContainer as SprykerFeatureCustomerDependencyContainer;

/**
 * @method Customer createCustomer()
 * @method CustomerBusiness getFactory()
 * @method CustomerQueryContainerInterface getQueryContainer()
 */
class CustomerDependencyContainer extends SprykerFeatureCustomerDependencyContainer
{
    
    /**
     * @return Model\MagentoPasswordManager
     */
    public function createMagentoPasswordManager()
    {
        return $this->getFactory()->createModelMagentoPasswordManager(
            $this->getQueryContainer()
        );
    }
}
