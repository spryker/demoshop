<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Process\Steps;

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
        if (empty($quoteTransfer->getBillingAddress())) {
            // add message: billing address is not set
            return false;
        }

        return true;
    }

    /**
     * @todo do we still need two parameters if we can use one from form, check this when all steps implemented.!!
     *
     * @param QuoteTransfer $quoteTransfer
     * @param QuoteTransfer $modifiedQuoteTransfer
     *
     * @return QuoteTransfer
     */
    public function execute(QuoteTransfer $quoteTransfer, $modifiedQuoteTransfer = null)
    {
        return $modifiedQuoteTransfer;
    }

}
