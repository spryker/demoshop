<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Product;

use Spryker\Zed\Kernel\Container;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductAbstractAfterCreatePlugin as ImageSetProductAbstractAfterCreatePlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductAbstractAfterCreatePlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductAbstractReadPlugin as ImageSetProductAbstractReadPlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductAbstractAfterUpdatePlugin as ImageSetProductAbstractAfterUpdatePlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductConcreteAfterCreatePlugin as ImageSetProductConcreteAfterCreatePlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductConcreteReadPlugin as ImageSetProductConcreteReadPlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductConcreteAfterUpdatePlugin as ImageSetProductConcreteAfterUpdatePlugin;
use Spryker\Zed\Product\ProductDependencyProvider as SprykerProductDependencyProvider;
use Spryker\Zed\Stock\Communication\Plugin\ProductConcreteAfterCreatePlugin as StockProductConcreteAfterCreatePlugin;
use Spryker\Zed\Stock\Communication\Plugin\ProductConcreteReadPlugin as StockProductConcreteReadPlugin;
use Spryker\Zed\Stock\Communication\Plugin\ProductConcreteAfterUpdatePlugin as StockProductConcreteAfterUpdatePlugin;
use Spryker\Zed\TaxProductConnector\Communication\Plugin\TaxSetProductAbstractAfterCreatePlugin;
use Spryker\Zed\TaxProductConnector\Communication\Plugin\TaxSetProductAbstractAfterUpdatePlugin;
use Spryker\Zed\TaxProductConnector\Communication\Plugin\TaxSetProductAbstractReadPlugin;

class ProductDependencyProvider extends SprykerProductDependencyProvider
{

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductAbstractPluginInterface[]
     */
    protected function getProductAbstractBeforeCreatePlugins(Container $container)
    {
        return [];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductAbstractPluginInterface[]
     */
    protected function getProductAbstractAfterCreatePlugins(Container $container)
    {
        return [
            new ImageSetProductAbstractAfterCreatePlugin(),
            new TaxSetProductAbstractAfterCreatePlugin(),
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductAbstractPluginInterface[]
     */
    protected function getProductAbstractReadPlugins(Container $container)
    {
        return [
            new ImageSetProductAbstractReadPlugin(),
            new TaxSetProductAbstractReadPlugin(),
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductAbstractPluginInterface[]
     */
    protected function getProductAbstractBeforeUpdatePlugins(Container $container)
    {
        return [];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductAbstractPluginInterface[]
     */
    protected function getProductAbstractAfterUpdatePlugins(Container $container)
    {
        return [
            new ImageSetProductAbstractAfterUpdatePlugin(),
            new TaxSetProductAbstractAfterUpdatePlugin(),
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductConcretePluginInterface[]
     */
    protected function getProductConcreteBeforeCreatePlugins(Container $container)
    {
        return [];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductConcretePluginInterface[]
     */
    protected function getProductConcreteAfterCreatePlugins(Container $container)
    {
        return [
            new ImageSetProductConcreteAfterCreatePlugin(),
            new StockProductConcreteAfterCreatePlugin()
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductConcretePluginInterface[]
     */
    protected function getProductConcreteReadPlugins(Container $container)
    {
        return [
            new ImageSetProductConcreteReadPlugin(),
            new StockProductConcreteReadPlugin()
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductConcretePluginInterface[]
     */
    protected function getProductConcreteBeforeUpdatePlugins(Container $container)
    {
        return [];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductConcretePluginInterface[]
     */
    protected function getProductConcreteAfterUpdatePlugins(Container $container)
    {
        return [
            new ImageSetProductConcreteAfterUpdatePlugin(),
            new StockProductConcreteAfterUpdatePlugin()
        ];
    }

}
