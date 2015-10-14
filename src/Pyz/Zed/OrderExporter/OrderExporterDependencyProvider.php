<?php

namespace Pyz\Zed\OrderExporter;

use SprykerEngine\Zed\Kernel\Container;
use SprykerEngine\Zed\Kernel\AbstractBundleDependencyProvider;

class OrderExporterDependencyProvider extends AbstractBundleDependencyProvider
{

    const COMMAND_PLUGINS = 'COMMAND_PLUGINS';

    const FACADE_SALES = 'sales facade';


    protected function getCommandPlugins(Container $container)
    {
        return [];
    }

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container[OrderExporterDependencyProvider::FACADE_SALES] = function (Container $container) {
            return $container->getLocator()->sales()->facade();
        };

        return $container;
    }

}
