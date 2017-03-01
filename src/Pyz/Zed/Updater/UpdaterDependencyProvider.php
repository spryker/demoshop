<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Updater;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class UpdaterDependencyProvider extends AbstractBundleDependencyProvider
{

    const SERVICE_UTIL_DATA_READER = 'util data reader service';

    const FACADE_LOCALE = 'FACADE_LOCALE';
    const FACADE_STOCK = 'FACADE_STOCK';
    const FACADE_OMS = 'FACADE_OMS';

    const QUERY_CONTAINER_PRODUCT = 'QUERY_CONTAINER_PRODUCT';
    const QUERY_CONTAINER_STOCK = 'QUERY_CONTAINER_STOCK';
    const QUERY_CONTAINER_SALES = 'QUERY_CONTAINER_SALES';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addLocaleFacade($container);
        $container = $this->addStockFacade($container);
        $container = $this->addOmsFacade($container);

        $container = $this->addProductQueryContainer($container);
        $container = $this->addStockQueryContainer($container);
        $container = $this->addSalesQueryContainer($container);
        $container = $this->addUtilDataReader($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addLocaleFacade(Container $container)
    {
        $container[static::FACADE_LOCALE] = function (Container $container) {
            return $container->getLocator()->locale()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addStockFacade(Container $container)
    {
        $container[static::FACADE_STOCK] = function (Container $container) {
            return $container->getLocator()->stock()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addOmsFacade(Container $container)
    {
        $container[static::FACADE_OMS] = function (Container $container) {
            return $container->getLocator()->oms()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductQueryContainer(Container $container)
    {
        $container[static::QUERY_CONTAINER_PRODUCT] = function (Container $container) {
            return $container->getLocator()->product()->queryContainer();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addStockQueryContainer(Container $container)
    {
        $container[static::QUERY_CONTAINER_STOCK] = function (Container $container) {
            return $container->getLocator()->stock()->queryContainer();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addSalesQueryContainer(Container $container)
    {
        $container[static::QUERY_CONTAINER_SALES] = function (Container $container) {
            return $container->getLocator()->sales()->queryContainer();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addUtilDataReader(Container $container)
    {
        $container[static::SERVICE_UTIL_DATA_READER] = function (Container $container) {
            return $container->getLocator()->utilDataReader()->service();
        };

        return $container;
    }

}
