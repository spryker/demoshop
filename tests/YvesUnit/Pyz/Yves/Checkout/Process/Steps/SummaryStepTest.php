<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace YvesUnit\Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\PaymentTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use Pyz\Yves\Checkout\Process\Steps\SummaryStep;
use Spryker\Client\Calculation\CalculationClientInterface;
use Spryker\Yves\CheckoutStepEngine\Dependency\Plugin\Handler\CheckoutStepHandlerPluginInterface;
use Symfony\Component\HttpFoundation\Request;

class SummaryStepTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return void
     */
    public function testExecuteShouldTriggerQuoteRecalculation()
    {
        $calculationClientMock = $this->createCalculationClientMock();
        $calculationClientMock->expects($this->once())->method('recalculate');

        $summaryStep = $this->createSummaryStep($calculationClientMock);
        $summaryStep->execute($this->createRequest(), new QuoteTransfer());
    }

    /**
     * @return void
     */
    public function testPostConditionShouldReturnWhenQuoteReadyForSummaryDisplay()
    {
        $calculationClientMock = $this->createCalculationClientMock();
        $summaryStep = $this->createSummaryStep($calculationClientMock);

        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setBillingAddress(new AddressTransfer());

        $paymentTransfer = new PaymentTransfer();
        $paymentTransfer->setPaymentProvider('test');

        $quoteTransfer->setPayment($paymentTransfer);
        $quoteTransfer->setShipment(new ShipmentTransfer());

        $this->assertTrue($summaryStep->postCondition($quoteTransfer));
    }

    /**
     * @return void
     */
    public function testRequireInputShouldBeTrue()
    {
        $calculationClientMock = $this->createCalculationClientMock();
        $summaryStep = $this->createSummaryStep($calculationClientMock);

        $this->assertTrue($summaryStep->requireInput(new QuoteTransfer()));
    }

    /**
     * @param \Spryker\Client\Calculation\CalculationClientInterface $calculationClientMock
     *
     * @return \Pyz\Yves\Checkout\Process\Steps\SummaryStep
     */
    protected function createSummaryStep(CalculationClientInterface $calculationClientMock)
    {
        return new SummaryStep(
            $calculationClientMock,
            'shipment',
            'escape_route'
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
     * @return \PHPUnit_Framework_MockObject_MockObject|\Spryker\Client\Calculation\CalculationClientInterface
     */
    protected function createCalculationClientMock()
    {
        return $this->getMock(CalculationClientInterface::class);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Spryker\Yves\CheckoutStepEngine\Dependency\Plugin\Handler\CheckoutStepHandlerPluginInterface
     */
    protected function createShipmentMock()
    {
        return $this->getMock(CheckoutStepHandlerPluginInterface::class);
    }

}
