<?php

namespace Pyz\Zed\Price\Communication\Plugin;

use ProjectA\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;
use Pyz\Zed\Price\Communication\PriceDependencyContainer;

class DemoDataInstaller extends AbstractInstallerPlugin
{

    /**
     * @var PriceDependencyContainer
     */
    protected $dependencyContainer;

    public function install()
    {
        $this->dependencyContainer->getInstallerFacade()->installDemoData($this->logger);
    }
}
