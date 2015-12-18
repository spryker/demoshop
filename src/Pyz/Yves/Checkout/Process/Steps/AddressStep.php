<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\QuoteTransfer;

class AddressStep extends BaseStep implements StepInterface
{

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function preCondition(QuoteTransfer $quoteTransfer)
    {
        if (count($quoteTransfer->getItems()) === 0) {
            return false;
        }
        return true;
    }

    /**
     * @return bool
     */
    public function requireInput()
    {
        return true;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(QuoteTransfer $quoteTransfer)
    {
        if (count($quoteTransfer->getBillingAddresses()) === 0) {
            // add message: billing address is not set
            return false;
        }

        return true;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     * @param mixed $data
     *
     * @return QuoteTransfer
     */
    public function execute(QuoteTransfer $quoteTransfer, $data = null)
    {
        $quoteTransfer->addBillingAddress(new AddressTransfer());

        return $quoteTransfer;
    }

}
