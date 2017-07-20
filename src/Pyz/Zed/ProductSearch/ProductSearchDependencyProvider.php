<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSearch;

use Pyz\Zed\ProductSearch\Dependency\ProductSearchToProductBridge;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\ProductSearch\ProductSearchDependencyProvider as SprykerProductSearchDependencyProvider;

class ProductSearchDependencyProvider extends SprykerProductSearchDependencyProvider
{

    const FACADE_PRODUCT_SEARCH = 'product search facade';
    const FACADE_PRICE = 'price facade';
    const FACADE_PRODUCT_LABEL = 'FACADE_PRODUCT_LABEL';

    const QUERY_CONTAINER_PRODUCT_IMAGE = 'product image query container';
    const QUERY_CONTAINER_CATEGORY = 'category query container';
    const QUERY_CONTAINER_PRODUCT_CATEGORY = 'product category query container';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $this->providePriceFacade($container);
        $this->provideProductSearchFacade($container);
        $this->provideProductLabelFacade($container);

        $this->provideProductImageQueryContainer($container);
        $this->provideCategoryQueryContainer($container);
        $this->provideProductCategoryQueryContainer($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return void
     */
    protected function provideProductFacade(Container $container)
    {
        $container[self::FACADE_PRODUCT] = function (Container $container) {
            return new ProductSearchToProductBridge($container->getLocator()->product()->facade());
        };
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return void
     */
    protected function provideProductLabelFacade(Container $container)
    {
        $container[self::FACADE_PRODUCT_LABEL] = function (Container $container) {
            return $container->getLocator()->productLabel()->facade();
        };
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return void
     */
    protected function providePriceFacade(Container $container)
    {
        $container[self::FACADE_PRICE] = function (Container $container) {
            return $container->getLocator()->price()->facade();
        };
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return void
     */
    protected function provideProductSearchFacade(Container $container)
    {
        $container[self::FACADE_PRODUCT_SEARCH] = function (Container $container) {
            return $container->getLocator()->productSearch()->facade();
        };
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return void
     */
    protected function provideProductImageQueryContainer(Container $container)
    {
        $container[self::QUERY_CONTAINER_PRODUCT_IMAGE] = function (Container $container) {
            return $container->getLocator()->productImage()->queryContainer();
        };
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return void
     */
    protected function provideCategoryQueryContainer(Container $container)
    {
        $container[self::QUERY_CONTAINER_CATEGORY] = function (Container $container) {
            return $container->getLocator()->category()->queryContainer();
        };
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return void
     */
    protected function provideProductCategoryQueryContainer(Container $container)
    {
        $container[self::QUERY_CONTAINER_PRODUCT_CATEGORY] = function (Container $container) {
            return $container->getLocator()->productCategory()->queryContainer();
        };
    }

}
