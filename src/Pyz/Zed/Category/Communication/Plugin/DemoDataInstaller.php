<?php

namespace Pyz\Zed\Category\Communication\Plugin;

use ProjectA\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;
use Pyz\Zed\Category\Communication\CategoryDependencyContainer;

/**
 * @method CategoryDependencyContainer getDependencyContainer()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

            public function install()
    {
        $this->getDependencyContainer()->getInstallerFacade()->installDemoData($this->messenger);
    }
}
