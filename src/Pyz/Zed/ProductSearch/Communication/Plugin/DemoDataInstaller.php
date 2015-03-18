<?php

namespace Pyz\Zed\ProductSearch\Communication\Plugin;

use ProjectA\Zed\Installer\Communication\Plugin\Cli\AbstractInstallerPlugin;
use Pyz\Zed\ProductSearch\Communication\ProductSearchDependencyContainer;

class DemoDataInstaller extends AbstractInstallerPlugin
{

    /**
     * @var ProductSearchDependencyContainer
     */
    protected $dependencyContainer;

    public function install()
    {
        $this->dependencyContainer->getInstallerFacade()->installDemoData($this->logger);
    }
}
