<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Shared\Transfer\AbstractTransfer;
use Symfony\Component\HttpFoundation\Request;

/**
 * Entry step executed first, it's needed to redirect customer to next required step.
 */
class EntryStep extends BaseStep
{

    /**
     * Require input, should we render view with form or just skip step after calling execute.
     *
     * @return bool
     */
    public function requireInput()
    {
        return false;
    }

    /**
     * Execute step logic, happens after form submit if provided, gets QuoteTransfer filled by data from form.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param QuoteTransfer|AbstractTransfer $updatedQuoteTransfer
     *
     * @return void
     */
    public function execute(Request $request, AbstractTransfer $updatedQuoteTransfer = null)
    {
    }

    /**
     * Conditions that should be met for this step to be marked as completed. returns true when satisfied.
     *
     * @return bool
     */
    public function postCondition()
    {
        return true;
    }

}
