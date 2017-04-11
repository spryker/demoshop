<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Wishlist\Business;

interface MoveToCartHandlerInterface
{

    /**
     * @param string $wishlistName
     * @param \Generated\Shared\Transfer\WishlistItemMetaTransfer[] $wishlistItemMetaTransferCollection
     *
     * @return int
     */
    public function moveAllAvailableToCart($wishlistName, $wishlistItemMetaTransferCollection);

}
