<?php

namespace Pyz\Zed\ProductOptions\Communication\Plugin;

use SprykerFeature\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;
use Pyz\Zed\ProductOptions\Communication\ProductOptionsDependencyContainer;

/**
 * @method ProductOptionsDependencyContainer getDependencyContainer()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    public function install()
    {
        $this->getDependencyContainer()->getInstallerFacade()->installDemoData($this->messenger);
    }
}
