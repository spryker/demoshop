<?php

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Pyz\Yves\Checkout\CheckoutFactory;
use Spryker\Client\Calculation\CalculationClient;
use Symfony\Component\HttpFoundation\Request;

class SummaryStep extends BaseStep implements StepInterface
{

    /**
     * @var CalculationClient
     */
    protected $calculationClient;

    /**
     * @param FlashMessengerInterface $flashMessenger
     * @param CalculationClient $calculationClient
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
     * @return bool
     */
    public function requireInput()
    {
        return true;
    }

    /**
     * @param Request $request
     * @param QuoteTransfer $quoteTransfer
     * @param CheckoutFactory $checkoutFactory
     *
     * @return QuoteTransfer
     */
    public function execute(Request $request, QuoteTransfer $quoteTransfer, CheckoutFactory $checkoutFactory)
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
            (empty($quoteTransfer->getPayment()) && $quoteTransfer->getPayment()->getPaymentSelection() === null)) {
            $this->flashMessenger->addErrorMessage('checkout.step.summary.post_condition_not_met');
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
