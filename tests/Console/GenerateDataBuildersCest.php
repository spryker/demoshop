<?php

namespace Console;

use ConsoleTester;

class GenerateDataBuildersCest
{

    /**
     * @param \Console\ConsoleTester $i
     *
     * @return void
     */
    public function dataBuilder(ConsoleTester $i)
    {
        $i->runSprykerCommand('transfer:databuilder:generate -vvv');
        $i->seeInShellOutput('CustomerBuilder.php was generated');
        $i->seeFileFound(codecept_data_dir() . 'cli_sandbox/src/Generated/Shared/DataBuilder/CustomerBuilder.php');
    }

}
