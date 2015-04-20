<?php

namespace Pyz\Zed\Installer\Business;

use ProjectA\Zed\Installer\Business\InstallerFacade as SprykerInstallerFacade;

class InstallerFacade extends SprykerInstallerFacade
{

    /**
     * @var InstallerDependencyContainer
     */
    protected $dependencyContainer;

    /**
     * @return DemoData\CategoryTreeInstaller
     */
    public function demoDataCategoryTreeInstaller()
    {
        return $this->dependencyContainer->createDemoDataCategoryTreeInstaller();
    }

    /**
     * @return DemoData\ProductInstaller
     */
    public function demoDataProductInstaller()
    {
        return $this->dependencyContainer->getDemoDataProductInstaller();
    }
}
