<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace YvesUnit\Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Process\Steps\EntryStep;
use Spryker\Client\Cart\CartClient;
use Symfony\Component\HttpFoundation\Request;

class EntryStepTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return void
     */
    public function testRequireInputShouldReturnFalse()
    {
        $entryStep = $this->createEntryStep();
        $this->assertFalse($entryStep->requireInput());
    }

    /**
     * @return void
     */
    public function testPostConditionShouldReturnTrue()
    {
        $entryStep = $this->createEntryStep();

        $this->assertTrue($entryStep->postCondition());
    }

    /**
     * @return void
     */
    public function testPreConditionShouldReturnFalseIfCarIsEmpty()
    {
        $entryStep = $this->createEntryStep();
        $this->assertFalse($entryStep->preCondition());
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\EntryStep
     */
    protected function createEntryStep()
    {
        return new EntryStep(
            $this->getCartClient(),
            'entry_route',
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

}
