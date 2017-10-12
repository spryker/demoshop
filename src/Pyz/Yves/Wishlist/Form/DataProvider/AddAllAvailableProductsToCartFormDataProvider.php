<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Wishlist\Form\DataProvider;

use Generated\Shared\Transfer\WishlistOverviewResponseTransfer;
use Pyz\Yves\Wishlist\Form\AddAllAvailableProductsToCartFormType;

class AddAllAvailableProductsToCartFormDataProvider
{
    /**
     * @param \Generated\Shared\Transfer\WishlistOverviewResponseTransfer|null $wishlistOverviewResponseTransfer
     *
     * @return array
     */
    public function getData(WishlistOverviewResponseTransfer $wishlistOverviewResponseTransfer = null)
    {
        $data = [
            AddAllAvailableProductsToCartFormType::WISHLIST_ITEM_META_COLLECTION => $this->getWishlistItemMetaCollection($wishlistOverviewResponseTransfer),
        ];

        return $data;
    }

    /**
     * @param \Generated\Shared\Transfer\WishlistOverviewResponseTransfer|null $wishlistOverviewResponseTransfer
     *
     * @return \Generated\Shared\Transfer\WishlistItemMetaTransfer[]
     */
    protected function getWishlistItemMetaCollection(WishlistOverviewResponseTransfer $wishlistOverviewResponseTransfer = null)
    {
        if (!$wishlistOverviewResponseTransfer) {
            return [];
        }

        return $wishlistOverviewResponseTransfer->getMeta()
            ->getWishlistItemMetaCollection()
            ->getArrayCopy();
    }
}
