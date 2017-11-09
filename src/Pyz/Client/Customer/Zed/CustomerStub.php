<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Customer\Zed;

use Generated\Shared\Transfer\CustomerOverviewRequestTransfer;
use Generated\Shared\Transfer\CustomersTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Client\Customer\Zed\CustomerStub as SprykerCustomerStub;

class CustomerStub extends SprykerCustomerStub implements CustomerStubInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerOverviewRequestTransfer $overviewRequest
     *
     * @return \Generated\Shared\Transfer\CustomerOverviewResponseTransfer|\Spryker\Shared\Kernel\Transfer\TransferInterface
     */
    public function getCustomerOverview(CustomerOverviewRequestTransfer $overviewRequest)
    {
        return $this->zedStub->call(
            '/customer/gateway/get-customer-overview',
            $overviewRequest
        );
    }

    /**
     * @return CustomersTransfer|\Spryker\Shared\Kernel\Transfer\TransferInterface
     */
    public function getCustomersInSameGroup(CustomerTransfer $customerTransfer)
    {
        return $this->zedStub->call('/customer/gateway/get-customers-in-same-group', $customerTransfer);
    }
}
