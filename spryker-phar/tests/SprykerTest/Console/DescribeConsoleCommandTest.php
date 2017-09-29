<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerTest\Console;

use PHPUnit_Framework_TestCase;
use Spryker\Console\DescribeConsoleCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * Auto-generated group annotations
 * @group SprykerTest
 * @group Console
 * @group DescribeConsoleCommandTest
 * Add your own group annotations below this line
 */
class DescribeConsoleCommandTest extends PHPUnit_Framework_TestCase
{

    /**
     * @return void
     */
    public function testConsole()
    {
        $application = new Application();
        $application->add(new DescribeConsoleCommand());

        $command = $application->find('describe');

        $simpleConfiguration = __DIR__ . '/Fixtures/simple-configuration.php';
        $tester = new CommandTester($command);
        $tester->execute([
            'command' => $command->getName(),
            DescribeConsoleCommand::ARGUMENT_CONFIGURATION => $simpleConfiguration,
        ]);

        $this->assertRegexp('/Description for:/', $tester->getDisplay());
    }

}
