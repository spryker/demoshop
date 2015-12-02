<?php

namespace Pyz\Zed\OrderExporter;

use SprykerEngine\Zed\Kernel\Container;
use SprykerEngine\Zed\Kernel\AbstractBundleDependencyProvider;

class OrderExporterDependencyProvider extends AbstractBundleDependencyProvider
{

    const COMMAND_PLUGINS = 'COMMAND_PLUGINS';

    const FACADE_SALES = 'sales facade';

    const FACADE_URL = 'url facade';

    const FACADE_PRODUCT = 'product facade';

    const FACADE_ADYEN = 'adyen facade';


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

        $container[OrderExporterDependencyProvider::FACADE_URL] = function (Container $container) {
            return $container->getLocator()->url()->facade();
        };

        $container[OrderExporterDependencyProvider::FACADE_PRODUCT] = function (Container $container) {
            return $container->getLocator()->product()->facade();
        };

        $container[OrderExporterDependencyProvider::FACADE_ADYEN] = function (Container $container) {
            return $container->getLocator()->adyen()->facade();
        };


        return $container;
    }

}
