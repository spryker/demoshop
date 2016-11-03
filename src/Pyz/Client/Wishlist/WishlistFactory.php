<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Wishlist;

use Pyz\Client\Wishlist\Storage\WishlistStorage;
use Spryker\Client\Wishlist\WishlistDependencyProvider;
use Spryker\Client\Wishlist\WishlistFactory as SprykerWishlistFactory;

class WishlistFactory extends SprykerWishlistFactory
{

    /**
     * @return \Spryker\Client\Wishlist\Storage\WishlistStorageInterface
     */
    public function createStorage()
    {
        return new WishlistStorage(
            $this->getProvidedDependency(WishlistDependencyProvider::STORAGE),
            $this->getProvidedDependency(WishlistDependencyProvider::CLIENT_PRODUCT)
        );
    }

}
