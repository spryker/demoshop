<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Wizard\Steps;


use Generated\Shared\Transfer\QuoteTransfer;

class PaymenStep implements StepInterface
{

    public function preCondition(QuoteTransfer $quoteTransfer)
    {
        // TODO: Implement preCondidion() method.
    }

    public function requireInput()
    {
        // TODO: Implement requireInput() method.
    }

    public function postCondition(QuoteTransfer $quoteTransfer)
    {
        // TODO: Implement postCondition() method.
    }

    public function execute(QuoteTransfer $quoteTransfer, $data = null)
    {
        return $quoteTransfer;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        // TODO: Implement getData() method.
    }
}
