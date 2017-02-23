<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace YvesUnit\Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\CheckoutErrorTransfer;
use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\SaveOrderTransfer;
use PHPUnit_Framework_TestCase;
use Pyz\Yves\Checkout\Process\Steps\PlaceOrderStep;
use Spryker\Client\Checkout\CheckoutClientInterface;
use Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @group YvesUnit
 * @group Pyz
 * @group Yves
 * @group Checkout
 * @group Process
 * @group Steps
 * @group PlaceOrderStepTest
 */
class PlaceOrderStepTest extends PHPUnit_Framework_TestCase
{

    /**
     * @return void
     */
    public function testPlaceOrderExecuteWhenExternalRedirectProvidedShouldSetIt()
    {
        $checkoutClientMock = $this->createCheckoutClientMock();
        $redirectUrl = 'http://www.ten-kur-toli.lt';

        $checkoutResponseTransfer = new CheckoutResponseTransfer();
        $checkoutResponseTransfer->setIsExternalRedirect(true);
        $checkoutResponseTransfer->setRedirectUrl($redirectUrl);
        $checkoutClientMock->expects($this->once())->method('placeOrder')->willReturn($checkoutResponseTransfer);

        $placeOrderStep = $this->createPlaceOrderStep($checkoutClientMock);
        $placeOrderStep->execute($this->createRequest(), new QuoteTransfer());
        $this->assertEquals($redirectUrl, $placeOrderStep->getExternalRedirectUrl());
    }

    /**
     * @return void
     */
    public function testPlaceOrderExecuteWhenOrderSuccessfullyPlacedShouldHaveStoreOrderData()
    {
        $checkoutClientMock = $this->createCheckoutClientMock();

        $checkoutResponseTransfer = new CheckoutResponseTransfer();
        $checkoutResponseTransfer->setIsSuccess(true);
        $saverOrderTransfer = new SaveOrderTransfer();
        $saverOrderTransfer->setOrderReference('#123');
        $checkoutResponseTransfer->setSaveOrder($saverOrderTransfer);

        $checkoutClientMock->expects($this->once())->method('placeOrder')->willReturn($checkoutResponseTransfer);

        $placeOrderStep = $this->createPlaceOrderStep($checkoutClientMock);
        $quoteTransfer = new QuoteTransfer();

        $placeOrderStep->execute($this->createRequest(), $quoteTransfer);

        $this->assertTrue($placeOrderStep->postCondition($quoteTransfer));
    }

    /**
     * @return void
     */
    public function testPlaceOrderExecuteWhenOrderHaveErrorsShouldLogToFlashMessenger()
    {
        $checkoutClientMock = $this->createCheckoutClientMock();

        $checkoutResponseTransfer = new CheckoutResponseTransfer();
        $checkoutResponseTransfer->addError(new CheckoutErrorTransfer());
        $checkoutResponseTransfer->addError(new CheckoutErrorTransfer());

        $checkoutClientMock->expects($this->once())->method('placeOrder')->willReturn($checkoutResponseTransfer);

        $flashMessengerMock = $this->createFlashMessengerMock();
        $flashMessengerMock->expects($this->exactly(2))->method('addErrorMessage');

        $placeOrderStep = $this->createPlaceOrderStep($checkoutClientMock, $flashMessengerMock);
        $placeOrderStep->execute($this->createRequest(), new QuoteTransfer());
    }

    /**
     * @return void
     */
    public function testPostConditionsShouldReturnTrueWhenOrderPlaceIsReady()
    {
        $checkoutResponseTransfer = new CheckoutResponseTransfer();
        $checkoutResponseTransfer->setIsSuccess(true);
        $checkoutClientMock = $this->createCheckoutClientMock();
        $checkoutClientMock->expects($this->once())->method('placeOrder')->willReturn($checkoutResponseTransfer);
        $placeOrderStep = $this->createPlaceOrderStep($checkoutClientMock);
        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setOrderReference('#123');

        $placeOrderStep->execute($this->createRequest(), $quoteTransfer);
        $this->assertTrue($placeOrderStep->postCondition($quoteTransfer));
    }

    /**
     * @return void
     */
    public function testRequireInputShouldBeFalse()
    {
        $checkoutClientMock = $this->createCheckoutClientMock();
        $placeOrderStep = $this->createPlaceOrderStep($checkoutClientMock);

        $this->assertFalse($placeOrderStep->requireInput(new QuoteTransfer()));
    }

    /**
     * @param \Spryker\Client\Checkout\CheckoutClientInterface $checkoutClientMock
     * @param null $flashMessengerMock
     *
     * @return \Pyz\Yves\Checkout\Process\Steps\PlaceOrderStep
     */
    protected function createPlaceOrderStep(CheckoutClientInterface $checkoutClientMock, $flashMessengerMock = null)
    {
        if ($flashMessengerMock === null) {
            $flashMessengerMock = $this->createFlashMessengerMock();
        }

        return new PlaceOrderStep(
            $checkoutClientMock,
            $flashMessengerMock,
            'place_order',
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
     * @return \PHPUnit_Framework_MockObject_MockObject|\Pyz\Yves\Application\Business\Model\FlashMessengerInterface
     */
    protected function createFlashMessengerMock()
    {
        return $this->getMockBuilder(FlashMessengerInterface::class)->getMock();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Spryker\Client\Checkout\CheckoutClientInterface
     */
    protected function createCheckoutClientMock()
    {
        return $this->getMockBuilder(CheckoutClientInterface::class)->getMock();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginInterface
     */
    protected function createShipmentMock()
    {
        return $this->getMockBuilder(StepHandlerPluginInterface::class)->getMock();
    }

}
