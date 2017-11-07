<?php

namespace Pyz\Zed\Customer\Business;

use Pyz\Zed\Customer\Business\Customer\Customer;
use \Spryker\Zed\Customer\Business\CustomerBusinessFactory as BaseCustomerBusinessFactory;

/**
 * @method \Pyz\Zed\Customer\Persistence\CustomerQueryContainer getQueryContainer()
 */
class CustomerBusinessFactory extends BaseCustomerBusinessFactory
{
    /**
     * @return \Spryker\Zed\Customer\Business\Customer\CustomerInterface
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
            $this->getStore()
        );

        return $customer;
    }
}
