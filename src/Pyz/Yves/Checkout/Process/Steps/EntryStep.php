<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Symfony\Component\HttpFoundation\Request;

class EntryStep extends BaseStep implements StepInterface
{

    /**
     * Requirements for this step, return true when satisfied.
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function preCondition(QuoteTransfer $quoteTransfer)
    {
        return !$this->isCartEmpty($quoteTransfer);
    }

    /**
     * Require input, should we render view with form or just skip step after calling execute.
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function requireInput(QuoteTransfer $quoteTransfer)
    {
       return false;
    }

    /**
     * Execute step logic, happens after form submit if provided, gets QuoteTransfer filled by data from form.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function execute(Request $request, QuoteTransfer $quoteTransfer)
    {
        return $quoteTransfer;
    }

    /**
     * Conditions that should be met for this step to be marked as completed. returns true when satisfied.
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(QuoteTransfer $quoteTransfer)
    {
        return true;
    }
}
