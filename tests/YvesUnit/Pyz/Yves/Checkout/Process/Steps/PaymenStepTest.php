<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace YvesUnit\Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\PaymentTransfer;
use Pyz\Yves\Checkout\Process\Steps\PaymentStep;
use Generated\Shared\Transfer\ExpenseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerPluginInterface;
use Pyz\Yves\Checkout\Process\Steps\ShipmentStep;
use Spryker\Client\Calculation\CalculationClientInterface;
use Spryker\Shared\Shipment\ShipmentConstants;
use Symfony\Component\HttpFoundation\Request;

class PaymenStepTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return void
     */
    public function testExecuteShouldSelectPlugin()
    {
        $paymentPlugiMock = $this->createPaymentPluginMock();
        $paymentPlugiMock->expects($this->once())->method('addToQuote');

        $paymenttStep = $this->createPaymentStep(['test' => $paymentPlugiMock]);

        $quoteTransfer = new QuoteTransfer();

        $paymentTransfer = new PaymentTransfer();
        $paymentTransfer->setPaymentSelection('test');
        $quoteTransfer->setPayment($paymentTransfer);

        $paymenttStep->execute($this->createRequest(), $quoteTransfer);
    }

    /**
     * @return void
     */
    public function testPostConditionsShouldReturnTrueWhenPaymenSet()
    {
        $quoteTransfer = new QuoteTransfer();
        $paymentTransfer = new PaymentTransfer();
        $paymentTransfer->setPaymentProvider('test');
        $quoteTransfer->setPayment($paymentTransfer);

        $paymentStep = $this->createPaymentStep([]);
        $this->assertTrue($paymentStep->postCondition($quoteTransfer));
    }

    /**
     * @return void
     */
    public function testGetTemplateVarsShouldReturnSubforms()
    {
        $paymentStep = $this->createPaymentStep([]);
        $templateVariables = $paymentStep->getTemplateVariables();
        $this->assertArrayHasKey('paymentMethodsSubForms', $templateVariables);
    }

    /**
     * @return void
     */
    public function testShipmentRequireInputShouldReturnTrue()
    {
        $paymentStep = $this->createPaymentStep([]);
        $this->assertTrue($paymentStep->requireInput(new QuoteTransfer()));
    }
    
    /**
     * @return PaymentStep
     */
    protected function createPaymentStep(array $paymentPlugins)
    {
        return new PaymentStep(
            $this->createFlashMessengerMock(),
            'payment',
            'escape_route',
            $paymentPlugins
        );
    }


    /**
     * @return Request
     */
    protected function createRequest()
    {
        return Request::createFromGlobals();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|FlashMessengerInterface
     */
    protected function createFlashMessengerMock()
    {
        return $this->getMock(FlashMessengerInterface::class);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|CheckoutStepHandlerPluginInterface
     */
    protected function createPaymentPluginMock()
    {
        return $this->getMock(CheckoutStepHandlerPluginInterface::class);
    }
}
