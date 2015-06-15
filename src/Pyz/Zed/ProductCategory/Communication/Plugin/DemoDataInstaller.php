<?php

namespace Pyz\Zed\ProductCategory\Communication\Plugin;

use Pyz\Zed\ProductCategory\Business\ProductCategoryFacade;
use SprykerFeature\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;
use Pyz\Zed\ProductCategory\Communication\ProductCategoryDependencyContainer;

/**
 * @method ProductCategoryDependencyContainer getDependencyContainer()
 * @method ProductCategoryFacade getFacade()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    public function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }
}
