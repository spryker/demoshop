<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Cart;

use Spryker\Zed\Cart\CartDependencyProvider as SprykerCartDependencyProvider;
use Spryker\Zed\Cart\Communication\Plugin\SkuGroupKeyPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\PriceCartConnector\Communication\Plugin\CartItemPricePlugin;
use Spryker\Zed\ProductBundle\Communication\Plugin\Cart\CartBundleAvailabilityPreCheckPlugin;
use Spryker\Zed\ProductBundle\Communication\Plugin\Cart\CartItemWithBundleGroupKeyExpanderPlugin;
use Spryker\Zed\ProductBundle\Communication\Plugin\Cart\CartPostSaveUpdateBundlesPlugin;
use Spryker\Zed\ProductBundle\Communication\Plugin\Cart\ExpandBundleItemsPlugin;
use Spryker\Zed\ProductCartConnector\Communication\Plugin\ProductCartPlugin;
use Spryker\Zed\ProductOptionCartConnector\Communication\Plugin\CartItemGroupKeyOptionPlugin;
use Spryker\Zed\ProductOptionCartConnector\Communication\Plugin\CartItemProductOptionPlugin;
use Spryker\Zed\ProductOptionCartConnector\Communication\Plugin\ChangeProductOptionQuantityPlugin;

class CartDependencyProvider extends SprykerCartDependencyProvider
{

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Cart\Dependency\ItemExpanderPluginInterface[]
     */
    protected function getExpanderPlugins(Container $container)
    {
        return [
            new ProductCartPlugin(),
            new CartItemPricePlugin(),
            new CartItemProductOptionPlugin(),
            new ExpandBundleItemsPlugin(),
            new SkuGroupKeyPlugin(),
            new CartItemGroupKeyOptionPlugin(),
            new CartItemWithBundleGroupKeyExpanderPlugin(),
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $containter
     *
     * @return \Spryker\Zed\Cart\Dependency\CartPreCheckPluginInterface[]
     */
    protected function getCartPreCheckPlugins(Container $containter)
    {
        return [
            new CartBundleAvailabilityPreCheckPlugin(),
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Cart\Dependency\PostSavePluginInterface[]
     */
    protected function getPostSavePlugins(Container $container)
    {
        return [
            new ChangeProductOptionQuantityPlugin(),
            new CartPostSaveUpdateBundlesPlugin(),
        ];
    }

}
