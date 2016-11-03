<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Wishlist\Storage;

use Generated\Shared\Transfer\StorageProductTransfer;
use Generated\Shared\Transfer\WishlistItemTransfer;
use Generated\Shared\Transfer\WishlistOverviewResponseTransfer;
use Orm\Zed\Product\Persistence\SpyProductAttributeKeyQuery;
use Spryker\Client\Wishlist\Storage\WishlistStorage as SprykerWishlistStorage;

class WishlistStorage extends SprykerWishlistStorage
{

    /**
     * @param \Generated\Shared\Transfer\WishlistOverviewResponseTransfer $wishlistResponseTransfer
     *
     * @return \Generated\Shared\Transfer\WishlistOverviewResponseTransfer
     */
    public function expandProductDetails(WishlistOverviewResponseTransfer $wishlistResponseTransfer)
    {
        $wishlistResponseTransfer->requireWishlist();

        $ids = [];
        foreach ($wishlistResponseTransfer->getItems() as $wishlistItem) {
            $ids[] = $wishlistItem->getFkProduct();
        }

        if (empty($ids)) {
            return $wishlistResponseTransfer;
        }

        $wishlistResponseTransfer->setItems(new \ArrayObject());

        $productConcreteData = $this->productClient->getProductConcreteCollection($ids);
        foreach ($productConcreteData as $productData) {
            $storageProduct = (new StorageProductTransfer())
                ->fromArray($productData, true);

            $wishlistItem = (new WishlistItemTransfer())
                ->setFkProduct($storageProduct->getId())
                ->setFkWishlist($wishlistResponseTransfer->getWishlist()->getIdWishlist())
                ->setProduct($storageProduct);

            $wishlistResponseTransfer->addItem($wishlistItem);
        }

        return $wishlistResponseTransfer;
    }

}
