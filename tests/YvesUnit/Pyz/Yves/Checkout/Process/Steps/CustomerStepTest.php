<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace YvesUnit\Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Client\Customer\CustomerClientInterface;
use Pyz\Yves\Checkout\Process\Steps\CustomerStep;
use Spryker\Yves\CheckoutStepEngine\Dependency\Plugin\Handler\CheckoutStepHandlerPluginInterface;
use Symfony\Component\HttpFoundation\Request;

class CustomerStepTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return void
     */
    public function testExecuteShouldTriggerAuthHandler()
    {
        $authHandlerMock = $this->createAuthHandlerMock();
        $authHandlerMock->expects($this->once())->method('addToQuote');

        $customerStep = $this->createCustomerStep(null, $authHandlerMock);
        $customerStep->execute($this->createRequest(), new QuoteTransfer());
    }

    /**
     * @return void
     */
    public function testPostConditionWhenCustomerTransferNotSetShouldReturnFalse()
    {
        $customerStep = $this->createCustomerStep();
        $this->assertFalse($customerStep->postCondition(new QuoteTransfer()));
    }

    /**
     * @return void
     */
    public function testPostConditionWhenCustomerTransferIsNotSetShouldReturnFalse()
    {
        $customerStep = $this->createCustomerStep();
        $this->assertFalse($customerStep->postCondition(new QuoteTransfer()));
    }

    /**
     * @return void
     */
    public function testPostConditionWhenCustomerIsLogedInAndTriesToLoginAsAGuestShouldReturnFalse()
    {
        $customerClientMock = $this->createCustomerClientMock();
        $customerClientMock->expects($this->once())->method('getCustomer')->willReturn(new CustomerTransfer());

        $customerStep = $this->createCustomerStep($customerClientMock);
        $quoteTransfer = new QuoteTransfer();
        $customerTransfer = new CustomerTransfer();
        $customerTransfer->setIsGuest(true);
        $quoteTransfer->setCustomer($customerTransfer);
        $this->assertFalse($customerStep->postCondition($quoteTransfer));
    }

    /**
     * @return void
     */
    public function testPostConditionWhenCustomerSetShouldReturnTrue()
    {
        $customerStep = $this->createCustomerStep();
        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setCustomer(new CustomerTransfer());

        $this->assertTrue($customerStep->postCondition($quoteTransfer));
    }

    /**
     * @return void
     */
    public function testRequireInputWhenCustomerIsSetShouldReturnFalse()
    {
        $customerStep = $this->createCustomerStep();
        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setCustomer(new CustomerTransfer());

        $this->assertFalse($customerStep->requireInput($quoteTransfer));
    }

    /**
     * @return void
     */
    public function testRequireInputWhenCustomerLogedInShouldReturnFalse()
    {
        $customerClientMock = $this->createCustomerClientMock();
        $customerClientMock->expects($this->once())->method('getCustomer')->willReturn(new CustomerTransfer());

        $customerStep = $this->createCustomerStep($customerClientMock);
        $quoteTransfer = new QuoteTransfer();

        $this->assertFalse($customerStep->requireInput($quoteTransfer));
    }

    /**
     * @return void
     */
    public function testRequireInputWhenNotLoggedInAndNotYetSetInQuoteShouldReturnTrue()
    {
        $customerStep = $this->createCustomerStep();
        $this->assertTrue($customerStep->requireInput(new QuoteTransfer()));
    }

    /**
     * @param null $authHandlerMock
     * @param null $customerClientMock
     *
     * @return \Pyz\Yves\Checkout\Process\Steps\CustomerStep
     */
    protected function createCustomerStep($customerClientMock = null, $authHandlerMock = null)
    {
        if ($authHandlerMock === null) {
            $authHandlerMock = $this->createAuthHandlerMock();
        }

        if ($customerClientMock === null) {
            $customerClientMock = $this->createCustomerClientMock();
        }

        return new CustomerStep(
            'customer_step',
            'escape_route',
            $authHandlerMock,
            $customerClientMock
        );
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Spryker\Yves\CheckoutStepEngine\Dependency\Plugin\Handler\CheckoutStepHandlerPluginInterface
     */
    protected function createAuthHandlerMock()
    {
        return $this->getMock(CheckoutStepHandlerPluginInterface::class);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function createRequest()
    {
        return Request::createFromGlobals();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Pyz\Client\Customer\CustomerClientInterface
     */
    protected function createCustomerClientMock()
    {
        return $this->getMock(CustomerClientInterface::class);
    }

}
