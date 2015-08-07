<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Wishlist\Communication\Plugin;

use Silex\Application;
use SprykerEngine\Yves\Application\Communication\Plugin\YvesControllerProvider;
use Symfony\Component\HttpFoundation\Request;

class WishlistControllerProvider extends YvesControllerProvider
{
    const ROUTE_WISHLIST = 'wishlist';
    const ROUTE_ADD = 'wishlist/add';
    const ROUTE_REMOVE = 'wishlist/remove';
    const ROUTE_DECREASE = 'wishlist/decrease';
    const ROUTE_INCREASE = 'wishlist/increase';
    const ROUTE_ADD_TO_GROUP = 'wishlist/add-to-cart';

    /**
     * @param Application $app
     */
    protected function defineControllers(Application $app)
    {
        $this->createGetController('/wishlist', static::ROUTE_WISHLIST, 'Wishlist', 'Wishlist');

        $this->createGetController('/wishlist/add/{sku}', static::ROUTE_ADD, 'Wishlist', 'Wishlist', 'add')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->convert('quantity', [$this, 'getQuantityFromRequest']);

        $this->createGetController('/wishlist/remove/{sku}/{groupKey}', static::ROUTE_REMOVE, 'Wishlist', 'Wishlist', 'remove')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->assert('groupKey', '[a-zA-Z0-9-_]+');


        $this->createGetController('/wishlist/decrease/{sku}/{groupKey}', static::ROUTE_DECREASE, 'Wishlist', 'Wishlist', 'decrease')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->assert('groupKey', '[a-zA-Z0-9-_]+');

        $this->createGetController('/wishlist/increase/{sku}/{groupKey}', static::ROUTE_INCREASE, 'Wishlist', 'Wishlist', 'increase')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->assert('groupKey', '[a-zA-Z0-9-_]+');

        $this->createGetController('/wishlist/add-to-cart/{groupKey}', static::ROUTE_ADD_TO_GROUP, 'Wishlist', 'Wishlist', 'addToCart')
            ->assert('groupKey', '[a-zA-Z0-9-_]+');
    }

    /**
     * @param mixed $parameter
     * @param Request $request
     *
     * @return int
     */
    public function getQuantityFromRequest($parameter, Request $request)
    {
        if ($request->isMethod('POST')) {
            return (int) $request->request->get('quantity', 1);
        }

        return (int) $request->query->get('quantity', 1);
    }

}
