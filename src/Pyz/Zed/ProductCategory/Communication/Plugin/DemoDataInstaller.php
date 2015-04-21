<?php

namespace Pyz\Zed\ProductCategory\Communication\Plugin;

use SprykerFeature\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;
use Pyz\Zed\ProductCategory\Communication\ProductCategoryDependencyContainer;

class DemoDataInstaller extends AbstractInstallerPlugin
{

    /**
     * @var ProductCategoryDependencyContainer
     */
    protected $dependencyContainer;

    public function install()
    {
        $this->dependencyContainer->getInstallerFacade()->installDemoData($this->messenger);
    }
}
