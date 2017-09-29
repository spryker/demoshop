<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerTest\Configuration\Command;

use Codeception\Test\Unit;
use Spryker\Configuration\Command\Command;

/**
 * Auto-generated group annotations
 * @group SprykerTest
 * @group Configuration
 * @group Command
 * @group CommandTest
 * Add your own group annotations below this line
 */
class CommandTest extends Unit
{

    const COMMAND_NAME = 'command';

    /**
     * @return void
     */
    public function testGetName()
    {
        $command = new Command(self::COMMAND_NAME);

        $this->assertSame(self::COMMAND_NAME, $command->getName());
    }

    /**
     * @return void
     */
    public function testSetExecuteString()
    {
        $command = new Command(self::COMMAND_NAME);
        $command->setExecutable('string to execute');

        $this->assertSame('string to execute', $command->getExecutable());
    }

}
