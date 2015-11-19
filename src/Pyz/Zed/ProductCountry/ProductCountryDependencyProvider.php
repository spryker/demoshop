<?php

namespace Pyz\Zed\ProductCountry;

use SprykerEngine\Zed\Kernel\AbstractBundleDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class ProductCountryDependencyProvider extends AbstractBundleDependencyProvider
{

    const COUNTRY_FACADE = 'county facade';
    const PRODUCT_FACADE = 'product facade';
    const PLUGIN_PROPEL_CONNECTION = 'propel connection plugin';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container[self::COUNTRY_FACADE] = function (Container $container) {
            return $container->getLocator()->country()->facade();
        };

        $container[self::PRODUCT_FACADE] = function (Container $container) {
            return $container->getLocator()->product()->facade();
        };

        $container[self::PLUGIN_PROPEL_CONNECTION] = function (Container $container) {
            return $container->getLocator()->propel()->pluginConnection()->get();
        };

        return $container;
    }

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideCommunicationLayerDependencies(Container $container)
    {
        $container[self::COUNTRY_FACADE] = function (Container $container) {
            return $container->getLocator()->country()->facade();
        };

        $container[self::PRODUCT_FACADE] = function (Container $container) {
            return $container->getLocator()->product()->facade();
        };

        return $container;
    }

}
