<?php

namespace Pyz\Client\Customer;

use Generated\Shared\Transfer\CustomerOverviewRequestTransfer;
use Generated\Shared\Transfer\CustomerOverviewResponseTransfer;
use Spryker\Client\Customer\CustomerClientInterface as SprykerCustomerClientInterface;

interface CustomerClientInterface extends SprykerCustomerClientInterface
{

    /**
     * @param \Generated\Shared\Transfer\CustomerOverviewRequestTransfer $overviewRequest
     *
     * @return \Generated\Shared\Transfer\CustomerOverviewResponseTransfer
     */
    public function getCustomerOverview(CustomerOverviewRequestTransfer $overviewRequest);

}
