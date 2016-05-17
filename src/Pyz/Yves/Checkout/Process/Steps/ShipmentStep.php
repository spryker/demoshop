<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */
namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\Calculation\CalculationClientInterface;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Shared\Shipment\ShipmentConstants;
use Spryker\Shared\Transfer\AbstractTransfer;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginCollection;
use Symfony\Component\HttpFoundation\Request;

class ShipmentStep extends BaseStep
{

    /**
     * @var \Spryker\Client\Calculation\CalculationClient
     */
    protected $calculationClient;

    /**
     * @var \Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginCollection
     */
    protected $shipmentPlugins;

    /**
     * @param \Spryker\Client\Calculation\CalculationClientInterface $calculationClient
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     * @param \Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginCollection $shipmentPlugins
     * @param string $stepRoute
     * @param string $escapeRoute
     */
    public function __construct(
        CalculationClientInterface $calculationClient,
        CartClientInterface $cartClient,
        StepHandlerPluginCollection $shipmentPlugins,
        $stepRoute,
        $escapeRoute
    ) {
        parent::__construct($cartClient, $stepRoute, $escapeRoute);

        $this->calculationClient = $calculationClient;
        $this->shipmentPlugins = $shipmentPlugins;
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
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function execute(Request $request, AbstractTransfer $updatedQuoteTransfer = null)
    {
        $quoteTransfer = $this->getDataClass();
        $quoteTransfer->fromArray($updatedQuoteTransfer->modifiedToArray());

        $shipmentSelection = $quoteTransfer->getShipment()->getShipmentSelection();

        if ($this->shipmentPlugins->has($shipmentSelection)) {
            $shipmentHandler = $this->shipmentPlugins->get($shipmentSelection);
            $shipmentHandler->addToDataClass($request, $quoteTransfer);
        }

        $this->setDataClass($this->calculationClient->recalculate($quoteTransfer));
    }

    /**
     * @return bool
     */
    public function postCondition()
    {
        if (!$this->isShipmentSet($this->getDataClass())) {
            return false;
        }

        return true;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
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
