<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Spryker\Shared\Kernel\Transfer\AbstractTransfer;

/**
 * Entry step executed first, it's needed to redirect customer to next required step.
 */
class EntryStep extends AbstractBaseStep
{

    /**
     * Require input, should we render view with form or just skip step after calling execute.
     *
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer $quoteTransfer
     *
     * @return bool
     */
    public function requireInput(AbstractTransfer $quoteTransfer)
    {
        return false;
    }

    /**
     * Conditions that should be met for this step to be marked as completed. returns true when satisfied.
     *
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(AbstractTransfer $quoteTransfer)
    {
        return true;
    }

}
