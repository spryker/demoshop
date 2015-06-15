<?php

namespace Pyz\Zed\Product\Communication\Plugin;

use Pyz\Zed\Product\Business\ProductFacade;
use SprykerFeature\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;
use Pyz\Zed\Product\Communication\ProductDependencyContainer;

/**
 * @method ProductDependencyContainer getDependencyContainer()
 * @method ProductFacade getFacade()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    public function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }
}
