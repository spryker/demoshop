<?php

namespace Pyz\Zed\ProductSearch\Communication\Plugin;

use ProjectA\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;
use Pyz\Zed\ProductSearch\Communication\ProductSearchDependencyContainer;

/**
 * @method ProductSearchDependencyContainer getDependencyContainer()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

            public function install()
    {
        $this->getDependencyContainer()->getInstallerFacade()->installDemoData($this->messenger);
    }
}
