<?php

namespace Pyz\Zed\Customer\Business;

use Generated\Shared\Customer\CustomerLoginResultInterface;
use Generated\Shared\Transfer\CustomerResponseTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Zed\Customer\Business\Customer\Customer;
use Generated\Shared\Customer\CustomerMagentoPasswordMigrationInterface;
use SprykerFeature\Zed\Customer\Business\CustomerFacade as SprykerCustomerFacade;
use Pyz\Zed\CustomerCheckoutConnector\Dependency\Facade\CustomerCheckoutConnectorToCustomerInterface;

/**
 * @method CustomerDependencyContainer getDependencyContainer()
 * @method Customer createCustomer()
 */
class CustomerFacade extends SprykerCustomerFacade implements CustomerCheckoutConnectorToCustomerInterface
{

    /**
     * @param CustomerMagentoPasswordMigrationInterface $customerTransfer
     * @return bool
     */
    public function migratePassword(CustomerMagentoPasswordMigrationInterface $customerTransfer)
    {
        return $this->getDependencyContainer()->createMagentoPasswordManager()->migratePassword($customerTransfer);
    }

    /**
     * @param CustomerMagentoPasswordMigrationInterface $customerTransfer
     * @return bool
     */
    public function hasMagentoPassword(CustomerMagentoPasswordMigrationInterface $customerTransfer)
    {
        $this->getDependencyContainer()->createMagentoPasswordManager()->hasMagentoPassword($customerTransfer);
    }
    /**
     * @param CustomerLoginResultInterface $customerLoginResultTransfer
     *
     * @return CustomerLoginResultInterface
     */
    public function getCustomerLoginResult(CustomerLoginResultInterface $customerLoginResultTransfer)
    {
        return $this->getDependencyContainer()
            ->createCustomer()
            ->getLoginResult($customerLoginResultTransfer);
    }

    /**
     * @param $email
     *
     * @return bool
     */
    public function hasCustomerWithPasswordByEmail($email)
    {
        return $this->getDependencyContainer()
            ->createCustomer()
            ->hasCustomerWithPasswordByEmail($email)
        ;
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return CustomerResponseTransfer
     */
    public function createGuest(CustomerTransfer $customerTransfer)
    {
        return $this->getDependencyContainer()
            ->createCustomer()
            ->createGuest($customerTransfer)
        ;
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return CustomerResponseTransfer
     */
    public function updateGuest(CustomerTransfer $customerTransfer)
    {
        return $this->getDependencyContainer()
            ->createCustomer()
            ->updateGuest($customerTransfer)
        ;
    }
}
