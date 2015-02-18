<?php 

namespace Generated\Zed\Installer\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class InstallerFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @param \ProjectA\Zed\Kernel\Business\Factory $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \ProjectA\Zed\Installer\Business\InstallerDependencyContainer
     */
    public function createInstallerDependencyContainer(\ProjectA\Zed\Kernel\Business\Factory $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('ProjectA\Zed\Installer\Business\InstallerDependencyContainer');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Installer\Business\InstallerFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Installer\Business\InstallerFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Installer\Business\Model\Installer
     */
    public function createModelInstaller()
    {
        $class = $this->transformClassName('Pyz\Zed\Installer\Business\Model\Installer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
