<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Pyz\Zed\Wishlist;

use SprykerFeature\Zed\ProductOptionWishlistConnector\Communication\Plugin\PreSaveGroupKeyProductOptionPlugin;
use SprykerFeature\Zed\Wishlist\Communication\Plugin\PreSaveSkuGroupKeyPlugin;
use SprykerFeature\Zed\ItemGrouperWishlistConnector\Communication\Plugin\PreSaveItemGroupingPlugin;
use SprykerFeature\Zed\Wishlist\WishlistDependencyProvider as BaseWishlistDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\Wishlist\Business\Operator\Add;
use SprykerFeature\Zed\Wishlist\Business\Operator\Decrease;
use SprykerFeature\Zed\Wishlist\Business\Operator\Increase;
use SprykerFeature\Zed\Wishlist\Business\Operator\Remove;

class WishlistDependencyProvider extends BaseWishlistDependencyProvider
{

    /**
     * @param Container $container
     *
     * @return array
     */
    protected function preSavePlugins(Container $container)
    {
        $groupingPlugin = new PreSaveItemGroupingPlugin();

        return [
            Add::OPERATION_NAME => [
                new PreSaveSkuGroupKeyPlugin(),
                new PreSaveGroupKeyProductOptionPlugin(),
                $groupingPlugin,
            ],
            Decrease::OPERATION_NAME => [
                $groupingPlugin,
            ],
            Increase::OPERATION_NAME => [
                $groupingPlugin,
            ],
            Remove::OPERATION_NAME => [
                $groupingPlugin,
            ],
        ];
    }

}
