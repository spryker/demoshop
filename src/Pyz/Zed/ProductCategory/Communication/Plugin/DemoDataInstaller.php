<?php

namespace Pyz\Zed\ProductCategory\Communication\Plugin;

use ProjectA\Zed\Installer\Communication\Plugin\Cli\AbstractInstallerPlugin;
use Pyz\Zed\ProductCategory\Communication\ProductCategoryDependencyContainer;

class DemoDataInstaller extends AbstractInstallerPlugin
{

    /**
     * @var ProductCategoryDependencyContainer
     */
    protected $dependencyContainer;

    public function install()
    {
        $this->dependencyContainer->getInstallerFacade()->installDemoData($this->logger);
    }
}
