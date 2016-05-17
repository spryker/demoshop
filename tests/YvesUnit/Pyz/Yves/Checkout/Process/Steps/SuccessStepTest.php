<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace YvesUnit\Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Client\Customer\CustomerClientInterface;
use Pyz\Yves\Checkout\Process\Steps\SuccessStep;
use Spryker\Client\Cart\CartClient;
use Symfony\Component\HttpFoundation\Request;

class SuccessStepTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return void
     */
    public function testExecuteShouldEmptyQuoteTransfer()
    {
        $customerClientMock = $this->createCustomerClientMock();
        $customerClientMock->expects($this->once())->method('markCustomerAsDirty');

        $successStep = $this->createSuccessStep($customerClientMock);

        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->addItem(new ItemTransfer());

        $this->getCartClient()->storeQuote($quoteTransfer);

        $this->assertTrue($successStep->preCondition());
        $successStep->execute($this->createRequest(), $quoteTransfer);
        
        $this->assertFalse($successStep->preCondition());
    }

    /**
     * @return void
     */
    public function testPostConditionsWhenOrderReferenceIsSetShouldReturnTrue()
    {
        $successStep = $this->createSuccessStep();

        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setOrderReference('#12');

        $this->getCartClient()->storeQuote($quoteTransfer);

        $this->assertTrue($successStep->postCondition());
    }

    /**
     * @return void
     */
    public function testPostConditionsWhenOrderReferenceIsMissingShouldReturnFalse()
    {
        $successStep = $this->createSuccessStep();
        $quoteTransfer = new QuoteTransfer();
        $this->getCartClient()->storeQuote($quoteTransfer);

        $this->assertFalse($successStep->postCondition());
    }

    /**
     * @param \Pyz\Client\Customer\CustomerClientInterface|null $customerClientMock
     *
     * @return \Pyz\Yves\Checkout\Process\Steps\SuccessStep
     */
    protected function createSuccessStep($customerClientMock = null)
    {
        if ($customerClientMock === null) {
            $customerClientMock = $this->createCustomerClientMock();
        }

        return new SuccessStep(
            $customerClientMock,
            $this->getCartClient(),
            'success_route',
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
