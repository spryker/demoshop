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
        //if (count($quoteTransfer->getItems()) === 0) {
            // add message: empty cart error
         //   return false;
       // }

        return true;
    }

    public function requireInput()
    {
        return true;
    }

    public function postCondition(QuoteTransfer $quoteTransfer)
    {
        if (count($quoteTransfer->getBillingAddresses()) === 0) {
            // add message: billing address is not set
            return false;
        }

        return true;
    }

    public function execute(QuoteTransfer $quoteTransfer, $data = null)
    {
        $quoteTransfer->addBillingAddress(new AddressTransfer());

        return $quoteTransfer;
    }

}
