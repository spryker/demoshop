<?php

namespace Pyz\Client\Customer\Service\Zed;

use Generated\Shared\Customer\CustomerMagentoPasswordMigrationInterface;
use Generated\Shared\Customer\CustomerLoginResultInterface;
use SprykerFeature\Client\Customer\Service\Zed\CustomerStub as SprykerFeatureCustomerStub;

class CustomerStub extends SprykerFeatureCustomerStub implements CustomerStubInterface
{

    /**
     * @param CustomerLoginResultInterface $customerLoginResultTransfer
     *
     * @return CustomerLoginResultInterface
     */
    public function getLoginResult(CustomerLoginResultInterface $customerLoginResultTransfer)
    {
        return $this->zedStub->call('/customer/gateway/customer-login-result', $customerLoginResultTransfer, null, true); //remove null & true when removing magento password migration ticket
    }
    /**
     * @param CustomerMagentoPasswordMigrationInterface $customerInterface
     * @return \SprykerEngine\Shared\Transfer\TransferInterface
     */
    public function migrateMagentoPassword(CustomerMagentoPasswordMigrationInterface $customerInterface)
    {
        return $this->zedStub->call('/customer/gateway/migrate-magento-password', $customerInterface, null, true); //remove null & true when removing magento password migration ticket
    }
}
