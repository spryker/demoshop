<?php

namespace Pyz\Client\Customer\Zed;

use Generated\Shared\Transfer\CustomerOverviewRequestTransfer;
use Spryker\Client\Customer\Zed\CustomerStub as SprykerCustomerStub;

class CustomerStub extends SprykerCustomerStub implements CustomerStubInterface
{

    /**
     * @param \Generated\Shared\Transfer\CustomerOverviewRequestTransfer $overviewRequest
     *
     * @return \Generated\Shared\Transfer\CustomerOverviewResponseTransfer
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
