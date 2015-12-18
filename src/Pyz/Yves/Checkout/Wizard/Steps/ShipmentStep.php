<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Wizard\Steps;

use Generated\Shared\Transfer\ExpenseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;

class ShipmentStep implements StepInterface
{

    public function preCondition(QuoteTransfer $quoteTransfer)
    {
        return true;
    }

    public function requireInput()
    {
        return true;
    }

    public function postCondition(QuoteTransfer $quoteTransfer)
    {
        if (count($quoteTransfer->getExpenses()) === 0) {
               return false;
        }

        return true;
    }

    public function execute(QuoteTransfer $quoteTransfer, $data = null)
    {
        $quoteTransfer->addExpense(new ExpenseTransfer());
        return $quoteTransfer;
    }

}
