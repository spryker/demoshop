<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */
namespace Pyz\Yves\Shipment\Handler;

use ArrayObject;
use Generated\Shared\Transfer\ExpenseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\ShipmentMethodTransfer;
use Spryker\Client\Shipment\ShipmentClientInterface;
use Spryker\Shared\Price\PriceMode;
use Spryker\Shared\Shipment\ShipmentConstants;
use Symfony\Component\HttpFoundation\Request;
use Exception;

class ShipmentHandler
{
    /**
     * @var \Spryker\Client\Shipment\ShipmentClientInterface
     */
    protected $shipmentClient;

    /** @var string */
    protected $noShipmentMethodName;

    /**
     * @param \Spryker\Client\Shipment\ShipmentClientInterface $shipmentClient
     * @param string $noShipmentMethodName
     */
    public function __construct(
        ShipmentClientInterface $shipmentClient,
        $noShipmentMethodName
    ) {
        $this->shipmentClient = $shipmentClient;
        $this->noShipmentMethodName = $noShipmentMethodName;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function addShipmentToQuote(Request $request, QuoteTransfer $quoteTransfer)
    {
        $shipmentTransfer = $quoteTransfer->getShipment();

        $shipmentMethodTransfer = $this->getShipmentMethod($quoteTransfer);
        $shipmentTransfer->setMethod($shipmentMethodTransfer);

        $shipmentExpenseTransfer = $this->createShippingExpenseTransfer($shipmentMethodTransfer, $quoteTransfer->getPriceMode());
        $this->replaceShipmentExpenseInQuote($quoteTransfer, $shipmentExpenseTransfer);

        return $quoteTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\ShipmentMethodsTransfer|\Generated\Shared\Transfer\ShipmentMethodTransfer
     */
    protected function getShipmentMethod(QuoteTransfer $quoteTransfer)
    {
        $selectedShipmentMethod = $quoteTransfer->getShipment()->getShipmentSelection();

        if ($this->noShipmentMethodName && $selectedShipmentMethod === $this->noShipmentMethodName) {
            return $this->getShipmentMethodNoShipment($quoteTransfer);
        }

        return $this->getShipmentMethodById($quoteTransfer, (int)$selectedShipmentMethod);
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param int $idShipmentMethod
     *
     * @return \Generated\Shared\Transfer\ShipmentMethodTransfer|null
     */
    protected function getShipmentMethodById(QuoteTransfer $quoteTransfer, $idShipmentMethod)
    {
        $shipmentMethodsTransfer = $this->getAvailableShipmentMethods($quoteTransfer);

        foreach ($shipmentMethodsTransfer->getMethods() as $shipmentMethodsTransfer) {
            if ($shipmentMethodsTransfer->getIdShipmentMethod() === $idShipmentMethod) {
                return $shipmentMethodsTransfer;
            }
        }

        return null;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @throws \Exception
     *
     * @return \Generated\Shared\Transfer\ShipmentMethodsTransfer|\Generated\Shared\Transfer\ShipmentMethodTransfer
     */
    protected function getShipmentMethodNoShipment(QuoteTransfer $quoteTransfer)
    {
        $shipmentMethodsTransfer = $this->getAvailableShipmentMethods($quoteTransfer);

        foreach ($shipmentMethodsTransfer->getMethods() as $shipmentMethodsTransfer) {
            if ($shipmentMethodsTransfer->getName() === $this->noShipmentMethodName) {
                return $shipmentMethodsTransfer;
            }
        }

        throw new Exception(sprintf('Please create a default no-shipment method with defined name "%s"', $this->noShipmentMethodName));
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\ShipmentMethodsTransfer
     */
    protected function getAvailableShipmentMethods(QuoteTransfer $quoteTransfer)
    {
        return $this->shipmentClient->getAvailableMethods($quoteTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ShipmentMethodTransfer $shipmentMethodTransfer
     * @param string $priceMode
     *
     * @return \Generated\Shared\Transfer\ExpenseTransfer
     */
    protected function createShippingExpenseTransfer(ShipmentMethodTransfer $shipmentMethodTransfer, $priceMode)
    {
        $shipmentExpenseTransfer = $this->createExpenseTransfer();
        $shipmentExpenseTransfer->fromArray($shipmentMethodTransfer->toArray(), true);
        $shipmentExpenseTransfer->setType(ShipmentConstants::SHIPMENT_EXPENSE_TYPE);
        $this->setPrice($shipmentExpenseTransfer, $shipmentMethodTransfer->getDefaultPrice(), $priceMode);
        $shipmentExpenseTransfer->setQuantity(1);

        return $shipmentExpenseTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\ExpenseTransfer $shipmentExpenseTransfer
     * @param int $price
     * @param string $priceMode
     *
     * @return void
     */
    protected function setPrice(ExpenseTransfer $shipmentExpenseTransfer, $price, $priceMode)
    {
        if ($priceMode === PriceMode::PRICE_MODE_NET) {
            $shipmentExpenseTransfer->setUnitGrossPrice(0);
            $shipmentExpenseTransfer->setUnitNetPrice($price);
            return;
        }

        $shipmentExpenseTransfer->setUnitNetPrice(0);
        $shipmentExpenseTransfer->setUnitGrossPrice($price);
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Generated\Shared\Transfer\ExpenseTransfer $expenseTransfer
     *
     * @return void
     */
    protected function replaceShipmentExpenseInQuote(QuoteTransfer $quoteTransfer, ExpenseTransfer $expenseTransfer)
    {
        $otherExpenseCollection = new ArrayObject();
        foreach ($quoteTransfer->getExpenses() as $expense) {
            if ($expense->getType() !== ShipmentConstants::SHIPMENT_EXPENSE_TYPE) {
                $otherExpenseCollection->append($expense);
            }
        }

        $quoteTransfer->setExpenses($otherExpenseCollection);
        $quoteTransfer->addExpense($expenseTransfer);
    }

    /**
     * @return \Generated\Shared\Transfer\ExpenseTransfer
     */
    protected function createExpenseTransfer()
    {
        return new ExpenseTransfer();
    }
}
