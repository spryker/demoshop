<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

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
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function preCondition(QuoteTransfer $quoteTransfer)
    {
        if ($this->isCartEmpty($quoteTransfer)) {
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
     * @param null $data
     *
     * @return QuoteTransfer
     */
    public function execute(QuoteTransfer $quoteTransfer, $data = null)
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
        return true;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    protected function isCartEmpty(QuoteTransfer $quoteTransfer)
    {
        return count($quoteTransfer->getItems()) === 0;
    }

}
