<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Pyz\Zed\Wishlist;

use SprykerFeature\Zed\Wishlist\WishlistDependencyProvider AS BaseWishlistDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class WishlistDependencyProvider extends BaseWishlistDependencyProvider
{
    /**
     * @param Container $container
     *
     * @return array
     */
    public function preSavePlugins(Container $container)
    {
        return [
           $container->getLocator()->wishlist()->pluginPreSaveSkuGroupKeyPlugin(),
           $container->getLocator()->itemGrouperWishlistConnector()->pluginPreSaveItemGroupingPlugin()
        ];
    }
}
