<?php

namespace Console;

use ConsoleTester;
use Helper\Console;

class GenerateBundleCest
{

    /**
     * @param \ConsoleTester $i
     *
     * @return void
     */
    public function generateZedBundle(ConsoleTester $i)
    {
        $i->runSprykerCommand('code:generate:bundle:zed Acme -vvv');
        $i->seeInShellOutput('Generated: Pyz/Zed/Acme/AcmeConfig.php');
        $i->seeInShellOutput('Generated: ZedBundleCodeGenerator');
        $bundleDir = codecept_data_dir() . Console::SANDBOX_DIR . 'src/Pyz/Zed/Acme';
        $i->seeFileFound('AcmeConfig.php', $bundleDir);
        $i->seeFileFound('AcmeDependencyProvider.php', $bundleDir);
        $i->seeFileFound('AcmeFacade.php', $bundleDir . '/Business');
    }

}
