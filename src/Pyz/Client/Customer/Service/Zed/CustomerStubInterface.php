<?php

namespace Pyz\Client\Customer\Service\Zed;

use Generated\Shared\Customer\CustomerLoginResultInterface;
use SprykerFeature\Client\Customer\Service\Zed\CustomerStubInterface as SprykerFeatureCustomerStubInterface;

interface CustomerStubInterface extends SprykerFeatureCustomerStubInterface
{

    /**
     * @param CustomerLoginResultInterface $customerLoginResultTransfer
     *
     * @return CustomerLoginResultInterface
     */
    public function getLoginResult(CustomerLoginResultInterface $customerLoginResultTransfer);

}
