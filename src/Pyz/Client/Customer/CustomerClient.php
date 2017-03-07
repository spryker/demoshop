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
     * {@inheritdoc}
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
     * {@inheritdoc}
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
     * {@inheritdoc}
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
     * {@inheritdoc}
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
     * {@inheritdoc}
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
