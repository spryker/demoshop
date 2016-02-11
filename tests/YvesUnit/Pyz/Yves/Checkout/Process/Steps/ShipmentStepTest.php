<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace YvesUnit\Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\ExpenseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerPluginInterface;
use Pyz\Yves\Checkout\Process\Steps\ShipmentStep;
use Spryker\Client\Calculation\CalculationClientInterface;
use Spryker\Shared\Shipment\ShipmentConstants;
use Symfony\Component\HttpFoundation\Request;

class ShipmentStepTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return void
     */
    public function testShipmentStepExecuteShouldTriggerPlugins()
    {
        $shipmentPlugiMock = $this->createShipmentMock();
        $shipmentPlugiMock->expects($this->once())->method('addToQuote');

        $shipmentStep = $this->createShipmentStep(['test' => $shipmentPlugiMock]);

        $quoteTransfer = new QuoteTransfer();

        $shipmentTransfer = new ShipmentTransfer();
        $shipmentTransfer->setShipmentSelection('test');
        $quoteTransfer->setShipment($shipmentTransfer);

        $shipmentStep->execute($this->createRequest(), $quoteTransfer);
    }

    /**
     * @return void
     */
    public function testShipmentPostConditionsShouldReturnTrueWhenShipmentSet()
    {
        $quoteTransfer = new QuoteTransfer();
        $expenseTransfer = new ExpenseTransfer();
        $expenseTransfer->setType(ShipmentConstants::SHIPMENT_EXPENSE_TYPE);
        $quoteTransfer->addExpense($expenseTransfer);

        $shipmentStep = $this->createShipmentStep([]);
        $this->assertTrue($shipmentStep->postCondition($quoteTransfer));
    }

    /**
     * @return bool
     */
    public function testShipmentRequireInputShouldReturnTrue()
    {
        $shipmentStep = $this->createShipmentStep([]);
        $this->assertTrue($shipmentStep->requireInput(new QuoteTransfer()));
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\ShipmentStep
     */
    protected function createShipmentStep(array $shipmentPlugins)
    {
        return new ShipmentStep(
            $this->createFlashMessengerMock(),
            $this->createCalculationClientMock(),
            'shipment',
            'escape_route',
            $shipmentPlugins
        );
    }


    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function createRequest()
    {
        return Request::createFromGlobals();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Pyz\Yves\Application\Business\Model\FlashMessengerInterface
     */
    protected function createFlashMessengerMock()
    {
        return $this->getMock(FlashMessengerInterface::class);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Spryker\Client\Calculation\CalculationClientInterface
     */
    protected function createCalculationClientMock()
    {
        return $this->getMock(CalculationClientInterface::class);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerPluginInterface
     */
    protected function createShipmentMock()
    {
        return $this->getMock(CheckoutStepHandlerPluginInterface::class);
    }
}
