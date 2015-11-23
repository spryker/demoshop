<?php

namespace Pyz\Zed\Customer\Communication\Controller;

use Generated\Shared\Customer\CustomerLoginResultInterface;
use Generated\Shared\Customer\CustomerMagentoPasswordMigrationInterface;
use Generated\Shared\Transfer\CustomerTransfer;
use SprykerFeature\Zed\Customer\Communication\Controller\GatewayController as SpyGatewayController;
use Pyz\Zed\Customer\Business\CustomerFacade;

/**
 * @method CustomerFacade getFacade()
 */
class GatewayController extends SpyGatewayController
{
    /**
     * @param CustomerMagentoPasswordMigrationInterface $customerTransfer
     *
     * @return CustomerTransfer
     */
    public function migrateMagentoPasswordAction(CustomerMagentoPasswordMigrationInterface $customerTransfer)
    {
        return $this->getFacade()->migratePassword($customerTransfer);
    }

    /**
     * @param CustomerLoginResultInterface $customerLoginResultTransfer
     *
     * @return CustomerLoginResultInterface
     */
    public function customerLoginResultAction(CustomerLoginResultInterface $customerLoginResultTransfer)
    {
        return $this->getFacade()->getCustomerLoginResult($customerLoginResultTransfer);
    }

}
