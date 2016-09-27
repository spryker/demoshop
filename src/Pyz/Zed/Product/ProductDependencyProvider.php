<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Product;

use Spryker\Zed\Product\ProductDependencyProvider as SprykerProductDependencyProvider;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductAbstractCreatePlugin as ImageSetProductAbstractCreatePlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductAbstractReadPlugin as ImageSetProductAbstractReadPlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductAbstractUpdatePlugin as ImageSetProductAbstractUpdatePlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductConcreteCreatePlugin as ImageSetProductConcreteCreatePlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductConcreteReadPlugin as ImageSetProductConcreteReadPlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductConcreteUpdatePlugin as ImageSetProductConcreteUpdatePlugin;


class ProductDependencyProvider extends SprykerProductDependencyProvider
{

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductAbstractPluginInterface[]
     */
    protected function getProductAbstractCreatePlugins(Container $container)
    {
        return [
            new ImageSetProductAbstractCreatePlugin()
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
            new ImageSetProductAbstractReadPlugin()
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductAbstractPluginInterface[]
     */
    protected function getProductAbstractUpdatePlugins(Container $container)
    {
        return [
            new ImageSetProductAbstractUpdatePlugin()
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductConcretePluginInterface[]
     */
    protected function getProductConcreteCreatePlugins(Container $container)
    {
        return [
            new ImageSetProductConcreteCreatePlugin()
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
            new ImageSetProductConcreteReadPlugin()
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductConcretePluginInterface[]
     */
    protected function getProductConcreteUpdatePlugins(Container $container)
    {
        return [
            new ImageSetProductConcreteUpdatePlugin()
        ];
    }

}
