<?php

namespace Pyz\Zed\Installer\Communication\Plugin;

use ProjectA\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;
use Pyz\Zed\Installer\Communication\InstallerDependencyContainer;

class ProductCategoryDemoDataInstaller extends AbstractInstallerPlugin
{

    /**
     * @var InstallerDependencyContainer
     */
    protected $dependencyContainer;

    public function install()
    {
        $this->dependencyContainer->getInstallerFacade()->installProductCategoryDemoData($this->messenger);
    }
}
