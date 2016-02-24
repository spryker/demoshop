<?php

namespace Pyz\Yves\Wishlist\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class WishlistControllerProvider extends AbstractYvesControllerProvider
{

    const ROUTE_WISHLIST = 'wishlist';
    const ROUTE_ADD = 'wishlist/add';
    const ROUTE_REMOVE = 'wishlist/remove';
    const ROUTE_DECREASE = 'wishlist/decrease';
    const ROUTE_INCREASE = 'wishlist/increase';
    const ROUTE_ADD_TO_GROUP = 'wishlist/add-to-cart';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createGetController('/{wishlist}', static::ROUTE_WISHLIST, 'Wishlist', 'Wishlist')
            ->assert('wishlist', $allowedLocalesPattern . 'wishlist|wishlist')
            ->value('wishlist', 'wishlist');

        $this->createGetController('/{wishlist}/add/{sku}', static::ROUTE_ADD, 'Wishlist', 'Wishlist', 'add')
            ->assert('wishlist', $allowedLocalesPattern . 'wishlist|wishlist')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->convert('quantity', [$this, 'getQuantityFromRequest'])
            ->value('wishlist', 'wishlist');

        $this->createGetController('/{wishlist}/remove/{sku}/{groupKey}', static::ROUTE_REMOVE, 'Wishlist', 'Wishlist', 'remove')
            ->assert('wishlist', $allowedLocalesPattern . 'wishlist|wishlist')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->assert('groupKey', '[a-zA-Z0-9-_]+')
            ->value('wishlist', 'wishlist');

        $this->createGetController('/{wishlist}/decrease/{sku}/{groupKey}', static::ROUTE_DECREASE, 'Wishlist', 'Wishlist', 'decrease')
            ->assert('wishlist', $allowedLocalesPattern . 'wishlist|wishlist')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->assert('groupKey', '[a-zA-Z0-9-_]+')
            ->value('wishlist', 'wishlist');

        $this->createGetController('/{wishlist}/increase/{sku}/{groupKey}', static::ROUTE_INCREASE, 'Wishlist', 'Wishlist', 'increase')
            ->assert('wishlist', $allowedLocalesPattern . 'wishlist|wishlist')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->assert('groupKey', '[a-zA-Z0-9-_]+')
            ->value('wishlist', 'wishlist');

        $this->createGetController('/{wishlist}/add-to-cart/{groupKey}', static::ROUTE_ADD_TO_GROUP, 'Wishlist', 'Wishlist', 'addToCart')
            ->assert('wishlist', $allowedLocalesPattern . 'wishlist|wishlist')
            ->assert('groupKey', '[a-zA-Z0-9-_]+')
            ->value('wishlist', 'wishlist');
    }

    /**
     * @param mixed $parameter
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return int
     */
    public function getQuantityFromRequest($parameter, Request $request)
    {
        if ($request->isMethod('POST')) {
            return (int)$request->request->get('quantity', 1);
        }

        return (int)$request->query->get('quantity', 1);
    }

}
