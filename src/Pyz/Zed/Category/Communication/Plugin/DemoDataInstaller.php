<?php

namespace Pyz\Zed\Category\Communication\Plugin;

use ProjectA\Zed\Installer\Communication\Plugin\Cli\AbstractInstallerPlugin;
use Pyz\Zed\Category\Communication\CategoryDependencyContainer;

class DemoDataInstaller extends AbstractInstallerPlugin
{

    /**
     * @var CategoryDependencyContainer
     */
    protected $dependencyContainer;

    public function install()
    {
        $this->dependencyContainer->getInstallerFacade()->installDemoData($this->logger);
    }
}
