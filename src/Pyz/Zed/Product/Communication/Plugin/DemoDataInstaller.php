<?php

namespace Pyz\Zed\Product\Communication\Plugin;

use SprykerFeature\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;
use Pyz\Zed\Product\Communication\ProductDependencyContainer;

/**
 * @method ProductDependencyContainer getDependencyContainer()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

            public function install()
    {
        $this->getDependencyContainer()->getInstallerFacade()->installDemoData($this->messenger);
    }
}
