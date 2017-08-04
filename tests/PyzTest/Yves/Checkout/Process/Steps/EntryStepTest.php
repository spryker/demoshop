<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Checkout\Process\Steps;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Client\Customer\CustomerClient;
use Pyz\Yves\Checkout\Process\Steps\EntryStep;
use Symfony\Component\HttpFoundation\Request;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Yves
 * @group Checkout
 * @group Process
 * @group Steps
 * @group EntryStepTest
 * Add your own group annotations below this line
 */
class EntryStepTest extends Unit
{

    /**
     * @return void
     */
    public function testRequireInputShouldReturnFalse()
    {
        $entryStep = $this->createEntryStep();
        $this->assertFalse($entryStep->requireInput(new QuoteTransfer()));
    }

    /**
     * @return void
     */
    public function testPostConditionShouldReturnTrue()
    {
        $entryStep = $this->createEntryStep();

        $this->assertTrue($entryStep->postCondition(new QuoteTransfer()));
    }

    /**
     * @return void
     */
    public function testPreConditionShouldReturnFalseIfCarIsEmpty()
    {
        $entryStep = $this->createEntryStep();
        $this->assertFalse($entryStep->preCondition(new QuoteTransfer()));
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\EntryStep
     */
    protected function createEntryStep()
    {
        return new EntryStep(
            'entry_route',
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
     * @return \Pyz\Client\Customer\CustomerClient
     */
    protected function createCustomerClient()
    {
        return new CustomerClient();
    }

}
