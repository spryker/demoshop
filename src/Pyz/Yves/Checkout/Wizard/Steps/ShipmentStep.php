<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Wizard\Steps;

use Generated\Shared\Transfer\QuoteTransfer;

class ShipmentStep implements StepInterface
{

    public function requireInput()
    {
        return true;
    }

    public function postCondition(QuoteTransfer $quoteTransfer)
    {
        return false;
    }

    public function execute(QuoteTransfer $quoteTransfer, $data = null)
    {
        //storeQuoteTransfer
    }

    public function preCondition(QuoteTransfer $quoteTransfer)
    {
        // TODO: Implement preCondidion() method.
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        // TODO: Implement getData() method.
    }
}
