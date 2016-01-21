<?php

namespace Pyz\Yves\Shipment\Handler;

use Generated\Shared\Transfer\ExpenseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\ShipmentMethodsTransfer;
use Generated\Shared\Transfer\ShipmentMethodTransfer;
use Spryker\Client\Shipment\ShipmentClientInterface;
use Spryker\Shared\Shipment\ShipmentConstants;
use Symfony\Component\HttpFoundation\Request;

class ShipmentHandler
{

    /**
     * @var ShipmentClientInterface
     */
    protected $shipmentClient;

    /**
     * @param ShipmentClientInterface $shipmentClient
     */
    public function __construct(ShipmentClientInterface $shipmentClient)
    {
        $this->shipmentClient = $shipmentClient;
    }

    /**
     * @param Request $request
     * @param QuoteTransfer $quoteTransfer
     *
     * @return QuoteTransfer
     */
    public function addShipmentToQuote(Request $request, QuoteTransfer $quoteTransfer)
    {
        $shipmentTransfer = $quoteTransfer->getShipment();

        $shipmentMethodTransfer = $this->getShipmentMethodById($quoteTransfer);
        $shipmentTransfer->setMethod($shipmentMethodTransfer);

        $shipmentExpenseTransfer = $this->createShippingExpenseTransfer($shipmentMethodTransfer);
        $this->replaceShipmentExpenseInQuote($quoteTransfer, $shipmentExpenseTransfer);

        return $quoteTransfer;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return ShipmentMethodTransfer|null
     */
    protected function getShipmentMethodById(QuoteTransfer $quoteTransfer)
    {
        $shipmentMethodsTransfer = $this->getAvailableShipmentMethods($quoteTransfer);
        $idShipmentMethod = $quoteTransfer->getShipment()->getMethod()->getIdShipmentMethod();

        foreach ($shipmentMethodsTransfer->getMethods() as $shipmentMethodsTransfer) {
            if ($shipmentMethodsTransfer->getIdShipmentMethod()  === $idShipmentMethod) {
                return $shipmentMethodsTransfer;
            }
        }

        return null;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return ShipmentMethodsTransfer
     */
    protected function getAvailableShipmentMethods(QuoteTransfer $quoteTransfer)
    {
        return $this->shipmentClient->getAvailableMethods($quoteTransfer);
    }

    /**
     * @param ShipmentMethodTransfer $shipmentMethodTransfer
     *
     * @return ExpenseTransfer
     */
    protected function createShippingExpenseTransfer(ShipmentMethodTransfer $shipmentMethodTransfer)
    {
        $shipmentExpenseTransfer = $this->createExpenseTransfer();
        $shipmentExpenseTransfer->fromArray($shipmentMethodTransfer->toArray(), true);
        $shipmentExpenseTransfer->setType(ShipmentConstants::SHIPMENT_EXPENSE_TYPE);
        $shipmentExpenseTransfer->setUnitGrossPrice($shipmentMethodTransfer->getDefaultPrice());
        $shipmentExpenseTransfer->setQuantity(1);

        return $shipmentExpenseTransfer;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     * @param ExpenseTransfer $expenseTransfer
     *
     * @return void
     */
    protected function replaceShipmentExpenseInQuote(QuoteTransfer $quoteTransfer, ExpenseTransfer $expenseTransfer)
    {
        $otherExpenseCollection = new \ArrayObject();
        foreach ($quoteTransfer->getExpenses() as $expense) {
            if ($expense->getType() !== ShipmentConstants::SHIPMENT_EXPENSE_TYPE) {
                $otherExpenseCollection->append($expense);
            }
        }

        $quoteTransfer->setExpenses($otherExpenseCollection);
        $quoteTransfer->addExpense($expenseTransfer);
    }

    /**
     * @return ExpenseTransfer
     */
    protected function createExpenseTransfer()
    {
        return new ExpenseTransfer();
    }

}
