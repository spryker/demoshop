<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Customer;

use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CustomerOverviewRequestTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Client\Customer\CustomerClient as SprykerCustomerClient;

/**
 * @method \Pyz\Client\Customer\CustomerFactory getFactory()
 */
class CustomerClient extends SprykerCustomerClient implements CustomerClientInterface
{

    /**
     * Specification:
     * - Loads information about e.g. orders and newsletter subscriptions.
     * - Returns a CustomerOverviewResponseTransfer.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CustomerOverviewRequestTransfer $overviewRequest
     *
     * @return \Generated\Shared\Transfer\CustomerOverviewResponseTransfer
     */
    public function getCustomerOverview(CustomerOverviewRequestTransfer $overviewRequest)
    {
        return $this->getFactory()
            ->createZedCustomerStub()
            ->getCustomerOverview($overviewRequest);
    }

    /**
     * Specification:
     * - Adds a new address to a customer.
     * - Updates default addresses for a customer.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\AddressTransfer $addressTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function createAddressAndUpdateCustomerDefaultAddresses(AddressTransfer $addressTransfer)
    {
        $customerTransfer = parent::createAddressAndUpdateCustomerDefaultAddresses($addressTransfer);

        $this->setCustomer($customerTransfer);

        return $customerTransfer;
    }

    /**
     * Specification:
     * - Updates a customer address.
     * - Updates default addresses for a customer.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\AddressTransfer $addressTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function updateAddressAndCustomerDefaultAddresses(AddressTransfer $addressTransfer)
    {
        $customerTransfer = parent::updateAddressAndCustomerDefaultAddresses($addressTransfer);

        $this->setCustomer($customerTransfer);

        return $customerTransfer;
    }

    /**
     * Specification:
     * - Stores a customer within the Quote.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function setCustomer(CustomerTransfer $customerTransfer)
    {
        parent::setCustomer($customerTransfer);

        $cartClient = $this->getFactory()->getCartClient();

        $quoteTransfer = $cartClient->getQuote();
        $quoteTransfer->setCustomer($customerTransfer);

        $cartClient->storeQuote($quoteTransfer);

        return $customerTransfer;
    }

    /**
     * Specification:
     * - Marks a customer as dirty.
     * - Customer will be reloaded from Zed with next request.
     *
     * @api
     *
     * @return void
     */
    public function markCustomerAsDirty()
    {
        if ($this->isLoggedIn() !== false) {
            $this->getCustomer()->setIsDirty(true);
        }
    }

}
