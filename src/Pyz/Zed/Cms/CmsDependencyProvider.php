<?php

namespace Pyz\Zed\Cms;

use SprykerEngine\Zed\Kernel\AbstractBundleDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\Cms\CmsDependencyProvider as SprykerCmsDependencyProvider;

class CmsDependencyProvider extends AbstractBundleDependencyProvider
{

    const PLUGIN_DEMO_DATA_INSTALLER = 'demo data installer';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        parent::provideBusinessLayerDependencies($container);

        // @todo this is not a external dependency
        $container[CmsDependencyProvider::PLUGIN_DEMO_DATA_INSTALLER] = function (Container $container) {
            return $container->getLocator()->cms()->pluginDemoDataInstaller();
        };

        return $container;
    }


}
