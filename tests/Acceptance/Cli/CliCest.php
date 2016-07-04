<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

<<<<<<< HEAD
namespace Acceptance\Cli;

use Acceptance\Cli\Tester\CliTester;
=======
namespace Acceptance\YvesAndZed;
>>>>>>> Cleaned up architecture

/**
 * @group Cli
 */
class CliCest
{

    /**
<<<<<<< HEAD
     * @param \Acceptance\Cli\Tester\CliTester $i
     *
     * @return void
     */
    public function testItShouldPossibleToRun(CliTester $i)
=======
     * @param \AcceptanceTester $i
     *
     * @return void
     */
    public function testItShouldPossibleToRun(\AcceptanceTester $i)
>>>>>>> Cleaned up architecture
    {
        $i->runShellCommand('vendor/bin/console application:build-navigation-cache -vvv');
        $i->canSeeInShellOutput('Build navigation cache');
    }

}
