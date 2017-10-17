<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Zed\Console\Console;

use PyzTest\Zed\Console\ConsoleConsoleTester;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Zed
 * @group Console
 * @group Console
 * @group GenerateDataBuildersCest
 * Add your own group annotations below this line
 */
class GenerateDataBuildersCest
{
    /**
     * @param \PyzTest\Zed\Console\ConsoleConsoleTester $i
     *
     * @return void
     */
    public function dataBuilder(ConsoleConsoleTester $i)
    {
        $i->runSprykerCommand('transfer:databuilder:generate -vvv');
        $i->seeInShellOutput('CustomerBuilder.php was generated');
        $i->seeFileFound(codecept_data_dir() . 'cli_sandbox/src/Generated/Shared/DataBuilder/CustomerBuilder.php');
    }
}
