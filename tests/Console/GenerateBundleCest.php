<?php
class GenerateBundlesCest
{
    // tests
    public function generateZedBundle(ConsoleTester $I)
    {
        $I->runSprykerCommand('code:generate:bundle:zed Acme -vvv');
        $I->seeInShellOutput('Generated: Pyz/Zed/Acme/AcmeConfig.php');
        $I->seeInShellOutput('Generated: ZedBundleCodeGenerator');
        $bundleDir = codecept_data_dir() . \Helper\Console::SANDBOX_DIR . 'src/Pyz/Zed/Acme';
        $I->seeFileFound('AcmeConfig.php', $bundleDir);
        $I->seeFileFound('AcmeDependencyProvider.php', $bundleDir);
        $I->seeFileFound('AcmeFacade.php', $bundleDir . '/Business');
    }
}
