<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Checkout\Process\Steps;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\PaymentTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Process\Steps\PaymentStep;
use Spryker\Client\Calculation\CalculationClientInterface;
use Spryker\Client\Payment\PaymentClientInterface;
use Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginCollection;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Yves
 * @group Checkout
 * @group Process
 * @group Steps
 * @group PaymentStepTest
 * Add your own group annotations below this line
 */
class PaymentStepTest extends Unit
{
    /**
     * @return void
     */
    public function testExecuteShouldSelectPlugin()
    {
        $paymentPluginMock = $this->createPaymentPluginMock();
        $paymentPluginMock->expects($this->once())->method('addToDataClass');

        $paymentStepHandler = new StepHandlerPluginCollection();
        $paymentStepHandler->add($paymentPluginMock, 'test');
        $paymentStep = $this->createPaymentStep($paymentStepHandler);

        $quoteTransfer = new QuoteTransfer();

        $paymentTransfer = new PaymentTransfer();
        $paymentTransfer->setPaymentSelection('test');
        $quoteTransfer->setPayment($paymentTransfer);

        $paymentStep->execute($this->createRequest(), $quoteTransfer);
    }

    /**
     * @return void
     */
    public function testShipmentRequireInputShouldReturnTrue()
    {
        $paymentStep = $this->createPaymentStep(new StepHandlerPluginCollection());
        $this->assertTrue($paymentStep->requireInput(new QuoteTransfer()));
    }

    /**
     * @param \Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginCollection $paymentPlugins
     *
     * @return \Pyz\Yves\Checkout\Process\Steps\PaymentStep
     */
    protected function createPaymentStep(StepHandlerPluginCollection $paymentPlugins)
    {
        return new PaymentStep(
            $this->getPaymentClientMock(),
            $paymentPlugins,
            'payment',
            'escape_route',
            $this->getFlashMessengerMock(),
            $this->getCalculationClientMock()
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
     * @return \PHPUnit_Framework_MockObject_MockObject|\Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginInterface
     */
    protected function createPaymentPluginMock()
    {
        return $this->getMockBuilder(StepHandlerPluginInterface::class)->getMock();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Spryker\Client\Payment\PaymentClientInterface
     */
    protected function getPaymentClientMock()
    {
        return $this->getMockBuilder(PaymentClientInterface::class)->getMock();
    }

    /**
     * @return \PHPUnit\Framework\MockObject\MockObject|\Spryker\Client\Calculation\CalculationClientInterface
     */
    protected function getCalculationClientMock()
    {
        return $this->getMockBuilder(CalculationClientInterface::class)->getMock();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface
     */
    protected function getFlashMessengerMock()
    {
        return $this->getMockBuilder(FlashMessengerInterface::class)->getMock();
    }
}
