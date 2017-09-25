<?php
/**
 * Created by PhpStorm.
 * User: theodorosliokos
 * Date: 25.09.17
 * Time: 21:59
 */

namespace Pyz\Zed\Customer\Business;

use Pyz\Zed\Customer\CustomerDependencyProvider;
use Pyz\Zed\Customer\Business\Customer\Customer;
use Pyz\Zed\DynamicPricing\Business\DynamicPricingFacadeInterface;
use Spryker\Zed\Customer\Business\CustomerBusinessFactory as SprykerBusinessFactory;

class CustomerBusinessFactory extends SprykerBusinessFactory
{
    /**
     * @return Customer
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
     * @return DynamicPricingFacadeInterface
     */
    private function getDynamicPricingFacade()
    {
        return $this->getProvidedDependency(CustomerDependencyProvider::DYNAMIC_PRICING_FACADE);
    }
}