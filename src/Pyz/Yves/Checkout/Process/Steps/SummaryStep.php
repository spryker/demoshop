<?php

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerPluginInterface;
use Spryker\Client\Calculation\CalculationClient;
use Symfony\Component\HttpFoundation\Request;

class SummaryStep extends BaseStep
{

    /**
     * @var \Spryker\Client\Calculation\CalculationClient
     */
    protected $calculationClient;

    /**
     * @param \Pyz\Yves\Application\Business\Model\FlashMessengerInterface $flashMessenger
     * @param \Spryker\Client\Calculation\CalculationClient $calculationClient
     * @param $stepRoute
     * @param $escapeRoute
     */
    public function __construct(
        FlashMessengerInterface $flashMessenger,
        CalculationClient $calculationClient,
        $stepRoute,
        $escapeRoute
    ) {
        parent::__construct($flashMessenger, $stepRoute, $escapeRoute);

        $this->calculationClient = $calculationClient;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function requireInput(QuoteTransfer $quoteTransfer)
    {
        return true;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerPluginInterface[] $plugins
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function execute(Request $request, QuoteTransfer $quoteTransfer)
    {
        return $this->calculationClient->recalculate($quoteTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(QuoteTransfer $quoteTransfer)
    {
        if ($quoteTransfer->getBillingAddress() === null ||
            $quoteTransfer->getShipment() === null ||
            (empty($quoteTransfer->getPayment()) && $quoteTransfer->getPayment()->getPaymentSelection() === null)) {
            $this->flashMessenger->addErrorMessage('checkout.step.summary.post_condition_not_met');
            return false;
        }

        return true;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function preCondition(QuoteTransfer $quoteTransfer)
    {
        return !$this->isCartEmpty($quoteTransfer);
    }

}
