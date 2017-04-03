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
            AddAllAvailableProductsToCartFormType::FIELD_SKU => $this->getSkuCollection($wishlistOverviewResponseTransfer),
        ];

        return $data;
    }

    /**
     * @param \Generated\Shared\Transfer\WishlistOverviewResponseTransfer|null $wishlistOverviewResponseTransfer
     *
     * @return array
     */
    protected function getSkuCollection(WishlistOverviewResponseTransfer $wishlistOverviewResponseTransfer = null)
    {
        $skuCollection = [];

        if (!$wishlistOverviewResponseTransfer) {
            return $skuCollection;
        }

        foreach ($wishlistOverviewResponseTransfer->getMeta()->getWishlistItemMetaCollection() as $wishlistItemMetaTransfer) {
            if (!$wishlistItemMetaTransfer->getIsAvailable()) {
                continue;
            }

            $skuCollection[] = $wishlistItemMetaTransfer->getSku();
        }

        return $skuCollection;
    }

}
