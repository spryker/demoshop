<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Checkout\Process\Steps;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\AddressesTransfer;
use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Client\Customer\CustomerClientInterface;
use Pyz\Yves\Checkout\Process\Steps\AddressStep;
use Symfony\Component\HttpFoundation\Request;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Yves
 * @group Checkout
 * @group Process
 * @group Steps
 * @group AddressStepTest
 * Add your own group annotations below this line
 */
class AddressStepTest extends Unit
{

    /**
     * @return void
     */
    public function testExecuteAddressStepWhenGuestIsSubmittedShouldUseDataFromAddressFromForm()
    {
        $customerClientMock = $this->createCustomerClientMock();
        $addressStep = $this->createAddressStep($customerClientMock);

        $quoteTransfer = new QuoteTransfer();
        $addressTransfer = new AddressTransfer();
        $addressTransfer->setAddress1('add1');
        $quoteTransfer->setShippingAddress($addressTransfer);
        $quoteTransfer->setBillingAddress(clone $addressTransfer);

        $addressStep->execute($this->createRequest(), $quoteTransfer);

        $this->assertEquals($addressTransfer->getAddress1(), $quoteTransfer->getShippingAddress()->getAddress1());
        $this->assertEquals($addressTransfer->getAddress1(), $quoteTransfer->getBillingAddress()->getAddress1());
    }

    /**
     * @return void
     */
    public function testExecuteAddressStepWhenLoggedInUserCreatesNewAddress()
    {
        $addressTransfer = new AddressTransfer();
        $addressTransfer->setIdCustomerAddress(1);
        $addressTransfer->setAddress1('add1');

        $customerTransfer = new CustomerTransfer();
        $customerTransfer->addBillingAddress($addressTransfer);
        $shipmentAddress = clone $addressTransfer;
        $shipmentAddress->setIdCustomerAddress(2);

        $addressesTransfer = new AddressesTransfer();
        $addressesTransfer->addAddress($addressTransfer);
        $addressesTransfer->addAddress($shipmentAddress);
        $customerTransfer->setAddresses($addressesTransfer);

        $customerClientMock = $this->createCustomerClientMock();
        $customerClientMock->expects($this->once())->method('getCustomer')->willReturn($customerTransfer);

        $addressStep = $this->createAddressStep($customerClientMock);

        $quoteTransfer = new QuoteTransfer();

        $billingAddressTransfer = new AddressTransfer();
        $billingAddressTransfer->setIdCustomerAddress(1);
        $quoteTransfer->setBillingAddress($billingAddressTransfer);

        $shippingAddressTransfer = new AddressTransfer();
        $shippingAddressTransfer->setIdCustomerAddress(1);
        $quoteTransfer->setShippingAddress($shippingAddressTransfer);

        $addressStep->execute($this->createRequest(), $quoteTransfer);

        $this->assertEquals($shipmentAddress->getAddress1(), $quoteTransfer->getShippingAddress()->getAddress1());
        $this->assertEquals($addressTransfer->getAddress1(), $quoteTransfer->getBillingAddress()->getAddress1());
    }

    /**
     * @return void
     */
    public function testExecuteWhenBillingAddressSameAsShippingSelectedShouldCopyShipmentIntoBilling()
    {
        $addressTransfer = new AddressTransfer();
        $addressTransfer->setIdCustomerAddress(1);
        $addressTransfer->setAddress1('add1');

        $customerTransfer = new CustomerTransfer();
        $addressesTransfer = new AddressesTransfer();
        $addressesTransfer->addAddress($addressTransfer);
        $customerTransfer->setAddresses($addressesTransfer);

        $customerClientMock = $this->createCustomerClientMock();
        $customerClientMock->expects($this->once())->method('getCustomer')->willReturn($customerTransfer);

        $addressStep = $this->createAddressStep($customerClientMock);

        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setBillingSameAsShipping(true);

        $shippingAddressTransfer = new AddressTransfer();
        $shippingAddressTransfer->setIdCustomerAddress(1);
        $quoteTransfer->setShippingAddress($shippingAddressTransfer);

        $addressStep->execute($this->createRequest(), $quoteTransfer);

        $this->assertEquals($addressTransfer->getAddress1(), $quoteTransfer->getShippingAddress()->getAddress1());
        $this->assertEquals($addressTransfer->getAddress1(), $quoteTransfer->getBillingAddress()->getAddress1());
    }

    /**
     * @return void
     */
    public function testPostConditionWhenNoAddressesSetShouldReturnFalse()
    {
        $addressStep = $this->createAddressStep();
        $this->assertFalse($addressStep->postCondition(new QuoteTransfer()));
    }

    /**
     * @return false
     */
    public function testPostConditionIfShippingIsEmptyShouldReturnFalse()
    {
        $addressStep = $this->createAddressStep();
        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setBillingAddress(new AddressTransfer());

        $this->assertFalse($addressStep->postCondition($quoteTransfer));
    }

    /**
     * @return void
     */
    public function testPostConditionIfBillingIsEmptyShouldReturnFalse()
    {
        $addressStep = $this->createAddressStep();
        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setShippingAddress(new AddressTransfer());

        $this->assertFalse($addressStep->postCondition($quoteTransfer));
    }

    /**
     * @return void
     */
    public function testPostConditionIfAddressesIsSetShouldReturnTrue()
    {
        $addressStep = $this->createAddressStep();
        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setShippingAddress(new AddressTransfer());
        $quoteTransfer->setBillingAddress(new AddressTransfer());

        $this->assertFalse($addressStep->postCondition($quoteTransfer));
    }

    /**
     * @return void
     */
    public function testRequireInputShouldReturnTrue()
    {
        $addressStep = $this->createAddressStep();
        $this->assertTrue($addressStep->requireInput(new QuoteTransfer()));
    }

    /**
     * @param \PHPUnit_Framework_MockObject_MockObject|\Pyz\Client\Customer\CustomerClientInterface|null $customerClientMock
     *
     * @return \Pyz\Yves\Checkout\Process\Steps\AddressStep
     */
    protected function createAddressStep($customerClientMock = null)
    {
        if ($customerClientMock === null) {
            $customerClientMock = $this->createCustomerClientMock();
        }

        $addressStepMock = $this->getMockBuilder(AddressStep::class)
            ->setMethods(['getDataClass'])
            ->setConstructorArgs([$customerClientMock, 'address_step', 'escape_route'])
            ->getMock();

        $addressStepMock->method('getDataClass')->willReturn(new QuoteTransfer());

        return $addressStepMock;
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
