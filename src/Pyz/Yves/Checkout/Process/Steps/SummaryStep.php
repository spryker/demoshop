<?php

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\Calculation\CalculationClient;

class SummaryStep extends BaseStep implements StepInterface
{

    /**
     * @var CalculationClient
     */
    protected $calculationClient;

    /**
     * @param string $stepRoute
     * @param string $escapeRoute
     * @param CalculationClient $calculationClient
     */
    public function __construct($stepRoute, $escapeRoute, CalculationClient $calculationClient)
    {
        parent::__construct($stepRoute, $escapeRoute);
        $this->calculationClient = $calculationClient;
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
     * @return QuoteTransfer
     */
    public function execute(QuoteTransfer $quoteTransfer)
    {
        return $this->calculationClient->recalculate($quoteTransfer);
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(QuoteTransfer $quoteTransfer)
    {
        if ($quoteTransfer->getBillingAddress() === null ||
            $quoteTransfer->getShipmentMethod() === null ||
            (empty($quoteTransfer->getPayment()) && $quoteTransfer->getPayment()->getPaymentId() === null)) {
            return false;
        }

        return true;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function preCondition(QuoteTransfer $quoteTransfer)
    {
        return !$this->isCartEmpty($quoteTransfer);
    }
}
