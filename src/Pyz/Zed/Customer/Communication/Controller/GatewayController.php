<?php

namespace Pyz\Zed\Customer\Communication\Controller;

use Generated\Shared\Customer\CustomerLoginResultInterface;
use Generated\Shared\Transfer\CustomerInfoTransfer;
use Pyz\Zed\Customer\Business\CustomerFacade;
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
        if ($this->getFacade()->hasMagentoPassword($customerTransfer)) {
            return $this->manageMagentoAccount($customerTransfer);
        }

        return false;
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

    /**
     * @param CustomerMagentoPasswordMigrationInterface $customerTransfer
     * @return bool
     */
    protected function manageMagentoAccount(CustomerMagentoPasswordMigrationInterface $customerTransfer)
    {
        return $this->getFacade()->migratePassword($customerTransfer);
    }
}
