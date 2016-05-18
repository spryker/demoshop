<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\Calculation\CalculationClientInterface;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Shared\Transfer\AbstractTransfer;
use Symfony\Component\HttpFoundation\Request;

class SummaryStep extends BaseStep
{

    /**
     * @var \Spryker\Client\Calculation\CalculationClient
     */
    protected $calculationClient;

    /**
     * @param \Spryker\Client\Calculation\CalculationClientInterface $calculationClient
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     * @param string $stepRoute
     * @param string $escapeRoute
     */
    public function __construct(
        CalculationClientInterface $calculationClient,
        CartClientInterface $cartClient,
        $stepRoute,
        $escapeRoute
    ) {
        parent::__construct($cartClient, $stepRoute, $escapeRoute);

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
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param QuoteTransfer|AbstractTransfer $updatedQuoteTransfer
     *
     * @return void
     */
    public function execute(Request $request, AbstractTransfer $updatedQuoteTransfer = null)
    {
        $quoteTransfer = $this->getDataClass();
        $quoteTransfer->fromArray($updatedQuoteTransfer->modifiedToArray());

        $this->setDataClass($this->calculationClient->recalculate($quoteTransfer));
    }

    /**
     * @return bool
     */
    public function postCondition()
    {
        $quoteTransfer = $this->getDataClass();

        if ($quoteTransfer->getBillingAddress() === null
            || $quoteTransfer->getShipment() === null
            || $quoteTransfer->getPayment() === null
            || $quoteTransfer->getPayment()->getPaymentProvider() === null
        ) {
            return false;
        }

        return true;
    }

    /**
     * @return array
     */
    public function getTemplateVariables()
    {
        return [
            'quoteTransfer' => $this->getDataClass()
        ];
    }
    
}
