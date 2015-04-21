<?php

namespace Pyz\Zed\Product\Communication\Plugin;

use SprykerFeature\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;
use Pyz\Zed\Product\Communication\ProductDependencyContainer;

class DemoDataInstaller extends AbstractInstallerPlugin
{

    /**
     * @var ProductDependencyContainer
     */
    protected $dependencyContainer;

    public function install()
    {
        $this->dependencyContainer->getInstallerFacade()->installDemoData($this->messenger);
    }
}
