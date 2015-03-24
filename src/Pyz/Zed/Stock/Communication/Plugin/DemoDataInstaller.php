<?php

namespace Pyz\Zed\Stock\Communication\Plugin;

use ProjectA\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;
use Pyz\Zed\Stock\Communication\StockDependencyContainer;

class DemoDataInstaller extends AbstractInstallerPlugin
{

    /**
     * @var StockDependencyContainer
     */
    protected $dependencyContainer;

    public function install()
    {
        $this->dependencyContainer->getInstallerFacade()->installDemoData($this->logger);
    }
}
