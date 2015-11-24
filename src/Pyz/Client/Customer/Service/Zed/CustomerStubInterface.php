<?php

namespace Pyz\Client\Customer\Service\Zed;

use Generated\Shared\Customer\CustomerLoginResultInterface;
use SprykerFeature\Client\Customer\Service\Zed\CustomerStubInterface as SprykerFeatureCustomerStubInterface;
use Generated\Shared\Customer\CustomerInterface;
use Generated\Shared\Customer\CustomerMagentoPasswordMigrationInterface;

interface CustomerStubInterface extends SprykerFeatureCustomerStubInterface
{

    /**
     * @param CustomerLoginResultInterface $customerLoginResultTransfer
     *
     * @return CustomerLoginResultInterface
     */
    public function getLoginResult(CustomerLoginResultInterface $customerLoginResultTransfer);

    /**
     * @param CustomerMagentoPasswordMigrationInterface $customerInterface
     * @return bool
     */
    public function migrateMagentoPassword(CustomerMagentoPasswordMigrationInterface $customerInterface);
}
