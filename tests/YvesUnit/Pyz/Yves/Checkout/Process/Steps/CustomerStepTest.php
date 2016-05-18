<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace YvesUnit\Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Client\Customer\CustomerClientInterface;
use Pyz\Yves\Checkout\Process\Steps\CustomerStep;
use Spryker\Client\Cart\CartClient;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginInterface;
use Symfony\Component\HttpFoundation\Request;

class CustomerStepTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return void
     */
    public function testExecuteShouldTriggerAuthHandler()
    {
        $authHandlerMock = $this->createAuthHandlerMock();
        $authHandlerMock->expects($this->once())->method('addToDataClass')->willReturnArgument(1);

        $customerStep = $this->createCustomerStep(null, $authHandlerMock);
        $customerStep->execute($this->createRequest(), new QuoteTransfer());
    }

    /**
     * @return void
     */
    public function testPostConditionWhenCustomerTransferNotSetShouldReturnFalse()
    {
        $customerStep = $this->createCustomerStep();
        $this->assertFalse($customerStep->postCondition());
    }

    /**
     * @return void
     */
    public function testPostConditionWhenCustomerIsLoggedInAndTriesToLoginAsAGuestShouldReturnFalse()
    {
        $customerClientMock = $this->createCustomerClientMock();
        $customerClientMock->expects($this->once())->method('getCustomer')->willReturn(new CustomerTransfer());

        $customerStep = $this->createCustomerStep($customerClientMock);
        $quoteTransfer = new QuoteTransfer();
        $customerTransfer = new CustomerTransfer();
        $customerTransfer->setIsGuest(true);
        $quoteTransfer->setCustomer($customerTransfer);

        $this->getCartClient()->storeQuote($quoteTransfer);

        $this->assertFalse($customerStep->postCondition());
    }

    /**
     * @return void
     */
    public function testPostConditionWhenCustomerSetShouldReturnTrue()
    {
        $customerStep = $this->createCustomerStep();
        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setCustomer(new CustomerTransfer());

        $this->assertTrue($customerStep->postCondition());
    }

    /**
     * @return void
     */
    public function testRequireInputWhenCustomerIsSetShouldReturnFalse()
    {
        $customerStep = $this->createCustomerStep();
        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setCustomer(new CustomerTransfer());

        $this->getCartClient()->storeQuote($quoteTransfer);

        $this->assertFalse($customerStep->requireInput());
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

        $this->getCartClient()->storeQuote($quoteTransfer);

        $this->assertFalse($customerStep->requireInput());
    }

    /**
     * @return void
     */
    public function testRequireInputWhenNotLoggedInAndNotYetSetInQuoteShouldReturnTrue()
    {
        $customerStep = $this->createCustomerStep();
        $this->assertTrue($customerStep->requireInput());
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
            $customerClientMock,
            $this->getCartClient(),
            $authHandlerMock,
            'customer_step',
            'escape_route'
        );
    }

    /**
     * @return \Spryker\Client\Cart\CartClient
     */
    protected function getCartClient()
    {
        return new CartClient();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginInterface
     */
    protected function createAuthHandlerMock()
    {
        return $this->getMock(StepHandlerPluginInterface::class);
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
