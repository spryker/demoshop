<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Wishlist\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;

/**
 * @method \Spryker\Client\Wishlist\WishlistClientInterface getClient()
 * @method \Pyz\Yves\Wishlist\WishlistFactory getFactory()
 */
class AddToWishlistController extends AbstractController
{

    /**
     * @return array
     */
    public function indexAction()
    {
        $wishlistCollection = $this->getClient()->getCustomerWishlistCollection();

        return $this->viewResponse([
            'wishlistCollection' => $wishlistCollection,
        ]);
    }

}
