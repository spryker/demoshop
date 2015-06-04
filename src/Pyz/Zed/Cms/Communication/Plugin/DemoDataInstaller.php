<?php

namespace Pyz\Zed\Cms\Communication\Plugin;

use SprykerFeature\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;
use Pyz\Zed\Cms\Communication\CmsDependencyContainer;

/**
 * @method CmsDependencyContainer getDependencyContainer()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{
    public function install()
    {
        $this->getDependencyContainer()->getInstallerFacade()->installDemoData($this->messenger);
    }
}
