<?php

namespace Pyz\Client\Customer\Zed;

use Generated\Shared\Transfer\CustomerOverviewRequestTransfer;
use Generated\Shared\Transfer\CustomerOverviewResponseTransfer;
use Spryker\Client\Customer\Zed\CustomerStub as SprykerCustomerStub;

class CustomerStub extends SprykerCustomerStub implements CustomerStubInterface
{

    /**
     * @param CustomerOverviewRequestTransfer $overviewRequest
     *
     * @return CustomerOverviewResponseTransfer
     */
    public function getCustomerOverview(CustomerOverviewRequestTransfer $overviewRequest)
    {
        return $this->zedStub->call(
            '/customer/gateway/get-customer-overview',
            $overviewRequest,
            null,
            true
        );
    }

}
