<?php

namespace Pyz\Zed\Customer\Business\Customer;

use Generated\Shared\Customer\CustomerInterface as CustomerTransferInterface;

interface CustomerInterface
{
    /**
     * @param CustomerTransferInterface $customerTransfer
     * @return CustomerTransferInterface
     */
    public function encryptPassword(CustomerTransferInterface $customerTransfer);
}
