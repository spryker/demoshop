<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Product;

use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Price\Communication\Plugin\ProductAbstract\PriceProductAbstractAfterCreatePlugin;
use Spryker\Zed\Price\Communication\Plugin\ProductAbstract\PriceProductAbstractAfterUpdatePlugin;
use Spryker\Zed\Price\Communication\Plugin\ProductAbstract\PriceProductAbstractReadPlugin;
use Spryker\Zed\Price\Communication\Plugin\ProductConcrete\PriceProductConcreteAfterCreatePlugin;
use Spryker\Zed\Price\Communication\Plugin\ProductConcrete\PriceProductConcreteAfterUpdatePlugin;
use Spryker\Zed\Price\Communication\Plugin\ProductConcrete\PriceProductConcreteReadPlugin;
use Spryker\Zed\Product\Communication\Plugin\ProductSuperAttributeMetadataSaverPlugin;
use Spryker\Zed\Product\Communication\Plugin\Sales\ProductIdHydratorPlugin;
use Spryker\Zed\Product\Communication\Plugin\Sales\ProductSuperAttributeMetadataHydratorPlugin;
use Spryker\Zed\Product\ProductDependencyProvider as SprykerProductDependencyProvider;
use Spryker\Zed\ProductBundle\Communication\Plugin\Product\ProductBundleProductConcreteAfterCreatePlugin;
use Spryker\Zed\ProductBundle\Communication\Plugin\Product\ProductBundleProductConcreteAfterUpdatePlugin;
use Spryker\Zed\ProductBundle\Communication\Plugin\Product\ProductBundleProductConcreteReadPlugin;
use Spryker\Zed\ProductBundle\Communication\Plugin\Sales\ProductBundleIdHydratorPlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductAbstractAfterCreatePlugin as ImageSetProductAbstractAfterCreatePlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductAbstractAfterUpdatePlugin as ImageSetProductAbstractAfterUpdatePlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductAbstractReadPlugin as ImageSetProductAbstractReadPlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductConcreteAfterCreatePlugin as ImageSetProductConcreteAfterCreatePlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductConcreteAfterUpdatePlugin as ImageSetProductConcreteAfterUpdatePlugin;
use Spryker\Zed\ProductImage\Communication\Plugin\ProductConcreteReadPlugin as ImageSetProductConcreteReadPlugin;
use Spryker\Zed\ProductOption\Communication\Plugin\Sales\ProductOptionGroupIdHydratorPlugin;
use Spryker\Zed\ProductSearch\Communication\Plugin\ProductConcrete\ProductSearchProductConcreteAfterCreatePlugin;
use Spryker\Zed\ProductSearch\Communication\Plugin\ProductConcrete\ProductSearchProductConcreteAfterUpdatePlugin;
use Spryker\Zed\ProductSearch\Communication\Plugin\ProductConcrete\ProductSearchProductConcreteReadPlugin;
use Spryker\Zed\Stock\Communication\Plugin\ProductConcreteAfterCreatePlugin as StockProductConcreteAfterCreatePlugin;
use Spryker\Zed\Stock\Communication\Plugin\ProductConcreteAfterUpdatePlugin as StockProductConcreteAfterUpdatePlugin;
use Spryker\Zed\Stock\Communication\Plugin\ProductConcreteReadPlugin as StockProductConcreteReadPlugin;
use Spryker\Zed\TaxProductConnector\Communication\Plugin\TaxSetProductAbstractAfterCreatePlugin;
use Spryker\Zed\TaxProductConnector\Communication\Plugin\TaxSetProductAbstractAfterUpdatePlugin;
use Spryker\Zed\TaxProductConnector\Communication\Plugin\TaxSetProductAbstractReadPlugin;

class ProductDependencyProvider extends SprykerProductDependencyProvider
{

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductAbstractPluginCreateInterface[]
     */
    protected function getProductAbstractBeforeCreatePlugins(Container $container)
    {
        return [];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductAbstractPluginCreateInterface[]
     */
    protected function getProductAbstractAfterCreatePlugins(Container $container)
    {
        return [
            new ImageSetProductAbstractAfterCreatePlugin(),
            new TaxSetProductAbstractAfterCreatePlugin(),
            new PriceProductAbstractAfterCreatePlugin(),
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductAbstractPluginReadInterface[]
     */
    protected function getProductAbstractReadPlugins(Container $container)
    {
        return [
            new ImageSetProductAbstractReadPlugin(),
            new TaxSetProductAbstractReadPlugin(),
            new PriceProductAbstractReadPlugin(),
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductAbstractPluginUpdateInterface[]
     */
    protected function getProductAbstractBeforeUpdatePlugins(Container $container)
    {
        return [];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductAbstractPluginUpdateInterface[]
     */
    protected function getProductAbstractAfterUpdatePlugins(Container $container)
    {
        return [
            new ImageSetProductAbstractAfterUpdatePlugin(),
            new TaxSetProductAbstractAfterUpdatePlugin(),
            new PriceProductAbstractAfterUpdatePlugin(),
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductConcretePluginCreateInterface[]
     */
    protected function getProductConcreteBeforeCreatePlugins(Container $container)
    {
        return [];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductConcretePluginCreateInterface[]
     */
    protected function getProductConcreteAfterCreatePlugins(Container $container)
    {
        return [
            new ImageSetProductConcreteAfterCreatePlugin(),
            new StockProductConcreteAfterCreatePlugin(),
            new PriceProductConcreteAfterCreatePlugin(),
            new ProductSearchProductConcreteAfterCreatePlugin(),
            new ProductBundleProductConcreteAfterCreatePlugin(),
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductConcretePluginReadInterface[]
     */
    protected function getProductConcreteReadPlugins(Container $container)
    {
        return [
            new ImageSetProductConcreteReadPlugin(),
            new StockProductConcreteReadPlugin(),
            new PriceProductConcreteReadPlugin(),
            new ProductSearchProductConcreteReadPlugin(),
            new ProductBundleProductConcreteReadPlugin(),
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductConcretePluginUpdateInterface[]
     */
    protected function getProductConcreteBeforeUpdatePlugins(Container $container)
    {
        return [];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductConcretePluginUpdateInterface[]
     */
    protected function getProductConcreteAfterUpdatePlugins(Container $container)
    {
        return [
            new ImageSetProductConcreteAfterUpdatePlugin(),
            new StockProductConcreteAfterUpdatePlugin(),
            new PriceProductConcreteAfterUpdatePlugin(),
            new ProductSearchProductConcreteAfterUpdatePlugin(),
            new ProductBundleProductConcreteAfterUpdatePlugin(),
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Product\Dependency\Plugin\ProductMetadataSaverInterface[]
     */
    protected function getMetadataSaverPlugins(Container $container)
    {
        return [
            new ProductSuperAttributeMetadataSaverPlugin(),
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return
     */
    protected function getMetadataHydratorPlugins(Container $container)
    {
        return [
            new ProductSuperAttributeMetadataHydratorPlugin(),
            new ProductIdHydratorPlugin(),
            new ProductBundleIdHydratorPlugin(),
            new ProductOptionGroupIdHydratorPlugin(),
        ];
    }

}
