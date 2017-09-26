<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Customer\Business;

use Pyz\Zed\Customer\Business\Customer\Customer;
use Pyz\Zed\Customer\CustomerDependencyProvider;
use Spryker\Zed\Customer\Business\CustomerBusinessFactory as SprykerBusinessFactory;

/**
 * Class CustomerBusinessFactory
 * @package Pyz\Zed\Customer\Business
 */
class CustomerBusinessFactory extends SprykerBusinessFactory
{

    /**
     * @return \Pyz\Zed\Customer\Business\Customer\Customer
     */
    public function createCustomer()
    {
        $config = $this->getConfig();

        $customer = new Customer(
            $this->getQueryContainer(),
            $this->createCustomerReferenceGenerator(),
            $config,
            $this->getMailFacade(),
            $this->getLocaleQueryContainer(),
            $this->getStore(),
            $this->getDynamicPricingFacade()
        );

        return $customer;
    }

    /**
     * @return \Pyz\Zed\DynamicPricing\Business\DynamicPricingFacadeInterface
     */
    private function getDynamicPricingFacade()
    {
        return $this->getProvidedDependency(CustomerDependencyProvider::DYNAMIC_PRICING_FACADE);
    }

}
