<?php

namespace Pyz\Zed\CustomerCheckoutConnector\Dependency\Facade;

use Generated\Shared\Transfer\CustomerResponseTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use SprykerFeature\Zed\CustomerCheckoutConnector\Dependency\Facade\CustomerCheckoutConnectorToCustomerInterface as SprykerCustomerCheckoutConnectorToCustomerInterface;

interface CustomerCheckoutConnectorToCustomerInterface extends SprykerCustomerCheckoutConnectorToCustomerInterface
{

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return CustomerResponseTransfer
     */
    public function updateCustomer(CustomerTransfer $customerTransfer);

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return CustomerResponseTransfer
     */
    public function createGuest(CustomerTransfer $customerTransfer);

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return CustomerResponseTransfer
     */
    public function updateGuest(CustomerTransfer $customerTransfer);

    /**
     * @param string $email
     *
     * @return bool
     */
    public function hasCustomerWithPasswordByEmail($email);
}
