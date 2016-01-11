<?php

namespace Pyz\Client\Customer;

use Generated\Shared\Transfer\CustomerOverviewRequestTransfer;
use Generated\Shared\Transfer\CustomerOverviewResponseTransfer;
use Spryker\Client\Customer\CustomerClient as SprykerCustomerClient;

/**
 * @method CustomerFactory getFactory()
 */
class CustomerClient extends SprykerCustomerClient implements CustomerClientInterface
{

    /**
     * @param CustomerOverviewRequestTransfer $overviewRequest
     *
     * @return CustomerOverviewResponseTransfer
     */
    public function getCustomerOverview(CustomerOverviewRequestTransfer $overviewRequest)
    {
        return $this->getFactory()
            ->createZedCustomerStub()
            ->getCustomerOverview($overviewRequest);
    }

}
