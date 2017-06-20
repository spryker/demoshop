<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace YvesUnit\Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\PaymentTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use PHPUnit_Framework_TestCase;
use Pyz\Yves\Checkout\Process\Steps\SummaryStep;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Yves\ProductBundle\Grouper\ProductBundleGrouperInterface;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @group YvesUnit
 * @group Pyz
 * @group Yves
 * @group Checkout
 * @group Process
 * @group Steps
 * @group SummaryStepTest
 */
class SummaryStepTest extends PHPUnit_Framework_TestCase
{

    /**
     * @return void
     */
    public function testPostConditionShouldReturnWhenQuoteReadyForSummaryDisplay()
    {
        $summaryStep = $this->createSummaryStep();

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
        $summaryStep = $this->createSummaryStep();

        $this->assertTrue($summaryStep->requireInput(new QuoteTransfer()));
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\SummaryStep
     */
    protected function createSummaryStep()
    {
        $productBundleGroupeMock = $this->createProductBundleGrouperMock();
        $cartClientMock = $this->createCartClientMock();

        return new SummaryStep(
            $productBundleGroupeMock,
            $cartClientMock,
            'shipment',
            'escape_route'
        );
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Spryker\Yves\ProductBundle\Grouper\ProductBundleGrouperInterface
     */
    protected function createProductBundleGrouperMock()
    {
        return $this->getMockBuilder(ProductBundleGrouperInterface::class)->getMock();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Spryker\Client\Cart\CartClientInterface
     */
    protected function createCartClientMock()
    {
        return $this->getMockBuilder(CartClientInterface::class)->getMock();
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function createRequest()
    {
        return Request::createFromGlobals();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginInterface
     */
    protected function createShipmentMock()
    {
        return $this->getMockBuilder(StepHandlerPluginInterface::class)->getMock();
    }

}
