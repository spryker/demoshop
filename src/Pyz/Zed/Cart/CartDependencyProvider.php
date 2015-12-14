<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Cart;

use Spryker\Zed\Cart\CartDependencyProvider as SprykerFeatureCartDependencyProvider;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Cart\Dependency\ItemExpanderPluginInterface;

class CartDependencyProvider extends SprykerFeatureCartDependencyProvider
{
    /**
     * @param Container $container
     *
     * @return ItemExpanderPluginInterface[]
     */
    protected function getExpanderPlugins(Container $container)
    {
        return [
            $container->getLocator()->productCartConnector()->pluginProductCartPlugin(),
            $container->getLocator()->priceCartConnector()->pluginCartItemPricePlugin(),
            $container->getLocator()->productOptionCartConnector()->pluginCartItemProductOptionPlugin(),
            $container->getLocator()->cart()->pluginSkuGroupKeyPlugin(),
            $container->getLocator()->productOptionCartConnector()->pluginCartItemGroupKeyOptionPlugin(),
        ];
    }
}
