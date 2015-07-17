<?php

namespace Pyz\Zed\ProductOption;

use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\ProductOption\ProductOptionDependencyProvider as SprykerProductOptionDependencyProvider;

class ProductOptionDependencyProvider extends SprykerProductOptionDependencyProvider
{

    const FACADE_PRODUCT_OPTION = 'FACADE_PRODUCT_OPTION';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container[self::FACADE_PRODUCT_OPTION] = function (Container $container) {
            return $container->getLocator()->productOption()->facade();
        };

        parent::provideBusinessLayerDependencies($container);

        return $container;
    }

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideCommunicationLayerDependencies(Container $container)
    {
        $container[self::FACADE_PRODUCT_OPTION] = function (Container $container) {
            return $container->getLocator()->productOption()->facade();
        };

        parent::provideCommunicationLayerDependencies($container);

        return $container;
    }

}
