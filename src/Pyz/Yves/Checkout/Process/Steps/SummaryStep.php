<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;

class SummaryStep extends BaseStep implements StepInterface
{

    public function preCondition(QuoteTransfer $quoteTransfer)
    {
        if (count($quoteTransfer->getItems()) === 0) {
            return false;
        }
        return true;
    }

    public function requireInput()
    {
        return true;
    }

    public function postCondition(QuoteTransfer $quoteTransfer)
    {
        return true;
    }

    public function execute(QuoteTransfer $quoteTransfer, $data = null)
    {
        return $quoteTransfer;
    }

}
