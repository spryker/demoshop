<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Wishlist\Communication\Plugin;

use Silex\Application;
use SprykerEngine\Yves\Application\Communication\Plugin\YvesControllerProvider;

class WishlistControllerProvider extends YvesControllerProvider
{
    const ROUTE_WISHLIST = 'wishlist';

    /**
     * @param Application $app
     */
    protected function defineControllers(Application $app)
    {
        $this->createGetController('/wishlist', static::ROUTE_WISHLIST, 'Wishlist', 'Wishlist');
    }
}
