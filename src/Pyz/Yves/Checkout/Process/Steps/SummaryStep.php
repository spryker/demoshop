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
     * SummaryStep constructor.
     */
    public function __construct($stepRoute, $escapeRoute, CalculationClient $calculationClient)
    {
        parent::__construct($stepRoute, $escapeRoute);
        $this->calculationClient = $calculationClient;
    }

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
        return $this->calculationClient->recalculate($quoteTransfer);
    }

}
