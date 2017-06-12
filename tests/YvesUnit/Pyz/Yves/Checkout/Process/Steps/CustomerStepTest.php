<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace YvesUnit\Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use PHPUnit_Framework_TestCase;
use Pyz\Client\Customer\CustomerClientInterface;
use Pyz\Yves\Checkout\Process\Steps\CustomerStep;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @group YvesUnit
 * @group Pyz
 * @group Yves
 * @group Checkout
 * @group Process
 * @group Steps
 * @group CustomerStepTest
 */
class CustomerStepTest extends PHPUnit_Framework_TestCase
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
        $this->assertFalse($customerStep->postCondition(new QuoteTransfer()));
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
    public function testRequireInputWhenCustomerIsSetShouldReturnTrue()
    {
        $customerStep = $this->createCustomerStep();
        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setCustomer(new CustomerTransfer());

        $this->assertTrue($customerStep->requireInput($quoteTransfer));
    }

    /**
     * @return void
     */
    public function testRequireInputWhenCustomerLoggedInShouldReturnFalse()
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
     * @param \PHPUnit_Framework_MockObject_MockObject|\Pyz\Client\Customer\CustomerClientInterface|null $customerClientMock
     * @param \PHPUnit_Framework_MockObject_MockObject|\Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginInterface|null $authHandlerMock
     *
     * @return \Pyz\Yves\Checkout\Process\Steps\CustomerStep
     */
    protected function createCustomerStep($customerClientMock = null, $authHandlerMock = null)
    {
        if ($customerClientMock === null) {
            $customerClientMock = $this->createCustomerClientMock();
        }
        if ($authHandlerMock === null) {
            $authHandlerMock = $this->createAuthHandlerMock();
        }

        return new CustomerStep(
            $customerClientMock,
            $authHandlerMock,
            'customer_step',
            'escape_route',
            '/logout'
        );
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginInterface
     */
    protected function createAuthHandlerMock()
    {
        return $this->getMockBuilder(StepHandlerPluginInterface::class)->getMock();
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
        return $this->getMockBuilder(CustomerClientInterface::class)->getMock();
    }

}
