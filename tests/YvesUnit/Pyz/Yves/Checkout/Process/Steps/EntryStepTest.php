<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace YvesUnit\Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use PHPUnit_Framework_TestCase;
use Pyz\Yves\Checkout\Process\Steps\EntryStep;
use Symfony\Component\HttpFoundation\Request;

/**
 * @group YvesUnit
 * @group Pyz
 * @group Yves
 * @group Checkout
 * @group Process
 * @group Steps
 * @group EntryStepTest
 */
class EntryStepTest extends PHPUnit_Framework_TestCase
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

}
