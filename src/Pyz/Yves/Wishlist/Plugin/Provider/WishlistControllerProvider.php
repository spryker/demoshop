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

    const ROUTE_ADD_TO_WISHLIST = 'wishlist/add-to-wishlist';
    const ROUTE_WISHLIST_OVERVIEW = 'wishlist/overview';
    const ROUTE_WISHLIST_UPDATE = 'wishlist/update';
    const ROUTE_WISHLIST_DELETE = 'wishlist/delete';
    const ROUTE_WISHLIST_DETAILS = 'wishlist/details';
    const ROUTE_ADD_ITEM = 'wishlist/add-item';
    const ROUTE_REMOVE_ITEM = 'wishlist/remove-item';
    const ROUTE_MOVE_TO_CART = 'wishlist/move-to-cart';
    const ROUTE_MOVE_ALL_AVAILABLE_TO_CART = 'wishlist/move-all-available-to-cart';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createGetController('/{wishlist}/add-to-wishlist', static::ROUTE_ADD_TO_WISHLIST, 'Wishlist', 'AddToWishlist')
            ->assert('wishlist', $allowedLocalesPattern . 'wishlist|wishlist')
            ->value('wishlist', 'wishlist');

        $this->createController('/{wishlist}', static::ROUTE_WISHLIST_OVERVIEW, 'Wishlist', 'WishlistOverview')
            ->assert('wishlist', $allowedLocalesPattern . 'wishlist|wishlist')
            ->value('wishlist', 'wishlist');

        $this->createController('/{wishlist}/update/{wishlistName}', static::ROUTE_WISHLIST_UPDATE, 'Wishlist', 'WishlistOverview', 'update')
            ->assert('wishlist', $allowedLocalesPattern . 'wishlist|wishlist')
            ->value('wishlist', 'wishlist')
            ->assert('wishlistName', '.+');

        $this->createPostController('/{wishlist}/delete/{wishlistName}', static::ROUTE_WISHLIST_DELETE, 'Wishlist', 'WishlistOverview', 'delete')
            ->assert('wishlist', $allowedLocalesPattern . 'wishlist|wishlist')
            ->value('wishlist', 'wishlist')
            ->assert('wishlistName', '.+');

        $this->createGetController('/{wishlist}/details/{wishlistName}', static::ROUTE_WISHLIST_DETAILS, 'Wishlist', 'Wishlist')
            ->assert('wishlist', $allowedLocalesPattern . 'wishlist|wishlist')
            ->value('wishlist', 'wishlist')
            ->assert('wishlistName', '.+');

        $this->createPostController('/{wishlist}/add-item', static::ROUTE_ADD_ITEM, 'Wishlist', 'Wishlist', 'addItem')
            ->assert('wishlist', $allowedLocalesPattern . 'wishlist|wishlist')
            ->value('wishlist', 'wishlist');

        $this->createPostController('/{wishlist}/remove-item', static::ROUTE_REMOVE_ITEM, 'Wishlist', 'Wishlist', 'removeItem')
            ->assert('wishlist', $allowedLocalesPattern . 'wishlist|wishlist')
            ->value('wishlist', 'wishlist');

        $this->createPostController('/{wishlist}/move-to-cart', static::ROUTE_MOVE_TO_CART, 'Wishlist', 'Wishlist', 'moveToCart')
            ->assert('wishlist', $allowedLocalesPattern . 'wishlist|wishlist')
            ->value('wishlist', 'wishlist')
            ->assert('sku', '[a-zA-Z0-9-_]+');

        $this->createPostController('/{wishlist}/move-all-available-to-cart/{wishlistName}', static::ROUTE_MOVE_ALL_AVAILABLE_TO_CART, 'Wishlist', 'Wishlist', 'moveAllAvailableToCart')
            ->assert('wishlist', $allowedLocalesPattern . 'wishlist|wishlist')
            ->value('wishlist', 'wishlist')
            ->assert('wishlistName', '.+');
    }

}
