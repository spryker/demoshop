<?php

namespace Pyz\Client\Customer\Zed;

use Generated\Shared\Transfer\CustomerOverviewRequestTransfer;
use Spryker\Client\Customer\Zed\CustomerStubInterface as SprykerCustomerStubInterface;

interface CustomerStubInterface extends SprykerCustomerStubInterface
{

    /**
     * @param \Generated\Shared\Transfer\CustomerOverviewRequestTransfer $overviewRequest
     *
     * @return \Generated\Shared\Transfer\CustomerOverviewResponseTransfer
     */
    public function getCustomerOverview(CustomerOverviewRequestTransfer $overviewRequest);

}
