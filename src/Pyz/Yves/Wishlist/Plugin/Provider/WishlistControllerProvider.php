<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Wishlist\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class WishlistControllerProvider extends AbstractYvesControllerProvider
{

    const ROUTE_WISHLIST_OVERVIEW = 'wishlist';
    const ROUTE_WISHLIST_OVERVIEW_BROWSE = 'wishlist/browse';
    const ROUTE_ADD_ITEM = 'wishlist/add-item';
    const ROUTE_REMOVE_ITEM = 'wishlist/remove-item';
    const ROUTE_MOVE_TO_CART = 'wishlist/move-to-cart';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createGetController('/{wishlist}', static::ROUTE_WISHLIST_OVERVIEW, 'Wishlist', 'Wishlist')
            ->assert('wishlist', $allowedLocalesPattern . 'wishlist|wishlist')
            ->value('wishlist', 'wishlist');

        $this->createGetController('/{wishlist}/browse', static::ROUTE_WISHLIST_OVERVIEW_BROWSE, 'Wishlist', 'Wishlist')
            ->assert('wishlist', $allowedLocalesPattern . 'wishlist|wishlist')
            ->value('wishlist', 'wishlist');

        $this->createGetController('/{wishlist}/add-item', static::ROUTE_ADD_ITEM, 'Wishlist', 'Wishlist', 'addItem')
            ->assert('wishlist', $allowedLocalesPattern . 'wishlist|wishlist')
            ->value('wishlist', 'wishlist')
            ->method('POST');

        $this->createGetController('/{wishlist}/remove-item', static::ROUTE_REMOVE_ITEM, 'Wishlist', 'Wishlist', 'removeItem')
            ->assert('wishlist', $allowedLocalesPattern . 'wishlist|wishlist')
            ->value('wishlist', 'wishlist')
            ->method('POST');

        $this->createController('/{wishlist}/move-to-cart', static::ROUTE_MOVE_TO_CART, 'Wishlist', 'Wishlist', 'moveToCart')
            ->assert('wishlist', $allowedLocalesPattern . 'wishlist|wishlist')
            ->value('wishlist', 'wishlist')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->method('POST');
    }

}
