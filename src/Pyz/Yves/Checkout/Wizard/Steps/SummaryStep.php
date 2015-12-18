<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Wizard\Steps;

use Generated\Shared\Transfer\QuoteTransfer;

class SummaryStep implements StepInterface
{

    public function preCondition(QuoteTransfer $quoteTransfer)
    {
        return true;
    }

    public function requireInput()
    {
        // TODO: Implement requireInput() method.
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
