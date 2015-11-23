<?php

namespace Pyz\Zed\Customer\Business;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Customer\CustomerLoginResultInterface;
use Generated\Shared\Transfer\CustomerInfoTransfer;
use Pyz\Zed\Customer\Business\Customer\Customer;
use Generated\Shared\Customer\CustomerMagentoPasswordMigrationInterface;
use SprykerFeature\Zed\Customer\Business\CustomerFacade as SprykerCustomerFacade;
use SprykerFeature\Zed\CustomerCheckoutConnector\Dependency\Facade\CustomerCheckoutConnectorToCustomerInterface;

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
}
