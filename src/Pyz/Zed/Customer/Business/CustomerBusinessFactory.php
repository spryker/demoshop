<?php

namespace Pyz\Zed\Customer\Business;

use Pyz\Zed\Customer\Business\Customer\Customer;
use \Spryker\Zed\Customer\Business\CustomerBusinessFactory as BaseCustomerBusinessFactory;
use Spryker\Zed\Customer\Business\Customer\EmailValidator;

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
            $this->createEmailValidator(),
            $this->getMailFacade(),
            $this->getLocaleQueryContainer(),
            $this->getStore()
        );

        return $customer;
    }

    /**
     * @return \Spryker\Zed\Customer\Business\Customer\EmailValidatorInterface
     */
    protected function createEmailValidator()
    {
        return new EmailValidator(
            $this->getQueryContainer(),
            $this->getUtilValidateService()
        );
    }
}
