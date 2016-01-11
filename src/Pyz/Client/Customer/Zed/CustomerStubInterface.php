<?php

namespace Pyz\Client\Customer\Zed;

use Generated\Shared\Transfer\CustomerOverviewRequestTransfer;
use Generated\Shared\Transfer\CustomerOverviewResponseTransfer;
use Spryker\Client\Customer\Zed\CustomerStubInterface as SprykerCustomerStubInterface;

interface CustomerStubInterface extends SprykerCustomerStubInterface
{

    /**
     * @param CustomerOverviewRequestTransfer $overviewRequest
     *
     * @return CustomerOverviewResponseTransfer
     */
    public function getCustomerOverview(CustomerOverviewRequestTransfer $overviewRequest);

}
