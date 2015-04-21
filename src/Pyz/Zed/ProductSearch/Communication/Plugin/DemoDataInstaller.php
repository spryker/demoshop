<?php

namespace Pyz\Zed\ProductSearch\Communication\Plugin;

use SprykerFeature\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;
use Pyz\Zed\ProductSearch\Communication\ProductSearchDependencyContainer;

class DemoDataInstaller extends AbstractInstallerPlugin
{

    /**
     * @var ProductSearchDependencyContainer
     */
    protected $dependencyContainer;

    public function install()
    {
        $this->dependencyContainer->getInstallerFacade()->installDemoData($this->messenger);
    }
}
