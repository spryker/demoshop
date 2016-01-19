<?php

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerInterface;
use Spryker\Client\Calculation\CalculationClient;
use Spryker\Shared\Shipment\ShipmentConstants;
use Symfony\Component\HttpFoundation\Request;

class ShipmentStep extends BaseStep implements StepInterface
{

    /**
     * @var CalculationClient
     */
    protected $calculationClient;

    /**
     * @var CheckoutStepHandlerInterface[]
     */
    protected $shipmentPlugins;

    /**
     * @param FlashMessengerInterface $flashMessenger
     * @param CalculationClient $calculationClient
     * @param string $stepRoute
     * @param string $escapeRoute
     * @param CheckoutStepHandlerInterface[] $shipmentPlugins
     */
    public function __construct(
        FlashMessengerInterface $flashMessenger,
        CalculationClient $calculationClient,
        $stepRoute,
        $escapeRoute,
        $shipmentPlugins
    ) {
        parent::__construct($flashMessenger, $stepRoute, $escapeRoute);

        $this->calculationClient = $calculationClient;
        $this->shipmentPlugins = $shipmentPlugins;
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
     *
     * @return QuoteTransfer
     */
    public function execute(Request $request, QuoteTransfer $quoteTransfer)
    {
        $shipmentSelection = $quoteTransfer->getShipment()->getShipmentSelection();

        if (isset($this->shipmentPlugins[$shipmentSelection])) {
            $shipmentHandler = $this->shipmentPlugins[$shipmentSelection];
            $shipmentHandler->addToQuote($request, $quoteTransfer);
        }

        return $this->calculationClient->recalculate($quoteTransfer);
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(QuoteTransfer $quoteTransfer)
    {
        if (!$this->isShipmentSet($quoteTransfer)) {
            $this->flashMessenger->addErrorMessage('checkout.step.shipment.shipment_not_set');
            return false;
        }

        return true;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    protected function isShipmentSet(QuoteTransfer $quoteTransfer)
    {
        foreach ($quoteTransfer->getExpenses() as $expenseTransfer) {
            if ($expenseTransfer->getType() === ShipmentConstants::SHIPMENT_EXPENSE_TYPE) {
                return true;
            }
        }

        return false;
    }

}
