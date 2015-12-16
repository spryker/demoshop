<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Wizard\Steps;

use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\QuoteTransfer;

class AddressStep implements StepInterface
{
    public function preCondition(QuoteTransfer $quoteTransfer)
    {
        return true;
    }

    public function requireInput()
    {
        return false;
    }

    public function postCondition(QuoteTransfer $quoteTransfer)
    {
        if (count($quoteTransfer->getBillingAddresses()) === 0) {
            return false;
        }

        return true;
    }

    public function execute(QuoteTransfer $quoteTransfer, $data = null)
    {
        $quoteTransfer->addBillingAddress(new AddressTransfer());
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        // TODO: Implement getData() method.
    }
}
