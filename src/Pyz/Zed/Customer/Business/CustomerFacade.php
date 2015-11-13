<?php

namespace Pyz\Zed\Customer\Business;

use Generated\Shared\Customer\CustomerLoginResultInterface;
use Generated\Shared\Transfer\CustomerInfoTransfer;
use Pyz\Zed\Customer\Business\Customer\Customer;
use SprykerFeature\Zed\Customer\Business\CustomerFacade as SprykerCustomerFacade;
use SprykerFeature\Zed\CustomerCheckoutConnector\Dependency\Facade\CustomerCheckoutConnectorToCustomerInterface;

/**
 * @method CustomerDependencyContainer getDependencyContainer()
 * @method Customer createCustomer()
 */
class CustomerFacade extends SprykerCustomerFacade implements CustomerCheckoutConnectorToCustomerInterface
{
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
