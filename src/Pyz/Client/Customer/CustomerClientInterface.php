<?php

namespace Pyz\Client\Customer;

use Generated\Shared\Transfer\CustomerOverviewRequestTransfer;
use Generated\Shared\Transfer\CustomerOverviewResponseTransfer;
use Spryker\Client\Customer\CustomerClientInterface as SprykerCustomerClientInterface;

interface CustomerClientInterface extends SprykerCustomerClientInterface
{

    /**
     * @param CustomerOverviewRequestTransfer $overviewRequest
     *
     * @return CustomerOverviewResponseTransfer
     */
    public function getCustomerOverview(CustomerOverviewRequestTransfer $overviewRequest);

}
