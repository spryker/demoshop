<?php
class GenerateDataBuildersCest
{
    // tests
    public function dataBuilder(ConsoleTester $I)
    {
        $I->runSprykerCommand('transfer:databuilder:generate -vvv');
        $I->seeInShellOutput('CustomerBuilder.php was generated');
        $I->seeFileFound(codecept_data_dir() . 'cli_sandbox/src/Generated/Shared/DataBuilder/CustomerBuilder.php');
    }
}
