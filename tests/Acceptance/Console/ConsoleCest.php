<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Console;

use Acceptance\Console\Tester\ConsoleTester;
use PHPUnit_Framework_Assert;

/**
 * @group Acceptance
 * @group Console
 * @group ConsoleCest
 */
class ConsoleCest
{

    /**
     * @param \Acceptance\Console\Tester\ConsoleTester $i
     *
     * @return void
     */
    public function testICanRunConsoleApplication(ConsoleTester $i)
    {
        $i->wantTo('See that console is running');

        $output = $i->runConsoleApplication();
        PHPUnit_Framework_Assert::assertRegExp('/Store/', $output);
        PHPUnit_Framework_Assert::assertRegExp('/Environment/', $output);
    }

}
