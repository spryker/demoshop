<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace YvesUnit\Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Pyz\Yves\Checkout\Process\Steps\SuccessStep;
use Symfony\Component\HttpFoundation\Request;

class SuccessStepTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return void
     */
    public function testExecuteShouldReturnEmptyQuoteTransfer()
    {
        $successStep = $this->createSuccessStep();

        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->addItem(new ItemTransfer());

        $quoteTransfer = $successStep->execute($this->createRequest(), $quoteTransfer);

        $this->assertCount(0, $quoteTransfer->getItems());
    }

    /**
     * @return void
     */
    public function testPostConditionsWhenOrderReferenceIsSetShouldReturnTrue()
    {
        $successStep = $this->createSuccessStep();

        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setOrderReference('#12');

        $this->assertTrue($successStep->postCondition($quoteTransfer));
    }

    /**
     * @return void
     */
    public function testPostConditionsWhenOrderReferenceIsMissingShouldReturnFalse()
    {
        $successStep = $this->createSuccessStep();
        $quoteTransfer = new QuoteTransfer();
        $this->assertFalse($successStep->postCondition($quoteTransfer));
    }
    
    
    /**
     * @return SuccessStep
     */
    protected function createSuccessStep()
    {
        return new SuccessStep(
            $this->createFlashMessengerMock(),
            'success_route',
            'escape_route'
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
}
