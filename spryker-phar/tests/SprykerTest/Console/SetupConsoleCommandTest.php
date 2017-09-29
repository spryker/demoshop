<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerTest\Console;

use PHPUnit_Framework_TestCase;
use Spryker\Console\SetupConsoleCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * Auto-generated group annotations
 * @group SprykerTest
 * @group Console
 * @group SetupConsoleCommandTest
 * Add your own group annotations below this line
 */
class SetupConsoleCommandTest extends PHPUnit_Framework_TestCase
{

    /**
     * @return void
     */
    public function testSetupConsole()
    {
        $application = new Application();
        $application->add(new SetupConsoleCommand());

        $command = $application->find('setup');

        $tester = new CommandTester($command);
        $tester->execute([
            'command' => $command->getName(),
            'stage' => 'development',
        ]);

        $this->assertRegexp('/Start setup for stage: development/', $tester->getDisplay());
    }

}
