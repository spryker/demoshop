<?php

namespace Pyz\Zed\Glossary\Communication\Plugin;

use SprykerFeature\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;
use Pyz\Zed\Glossary\Communication\GlossaryDependencyContainer;

/**
 * @method GlossaryDependencyContainer getDependencyContainer()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{
            public function install()
    {
        $this->getDependencyContainer()->getInstallerFacade()->installDemoData($this->messenger);
    }
}
