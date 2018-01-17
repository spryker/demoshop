<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Wishlist\Business;

use Generated\Shared\Transfer\WishlistItemMetaTransfer;
use Generated\Shared\Transfer\WishlistItemTransfer;
use Generated\Shared\Transfer\WishlistMoveToCartRequestCollectionTransfer;
use Generated\Shared\Transfer\WishlistMoveToCartRequestTransfer;
use Spryker\Client\Customer\CustomerClientInterface;
use Spryker\Client\Wishlist\WishlistClientInterface;

class MoveToCartHandler implements MoveToCartHandlerInterface
{
    /**
     * @var \Spryker\Client\Wishlist\WishlistClientInterface
     */
    protected $wishlistClient;

    /**
     * @var \Spryker\Client\Customer\CustomerClientInterface
     */
    protected $customerClient;

    /**
     * @var \Pyz\Yves\Wishlist\Business\AvailabilityReaderInterface
     */
    protected $availabilityReader;

    /**
     * @param \Spryker\Client\Wishlist\WishlistClientInterface $wishlistClient
     * @param \Spryker\Client\Customer\CustomerClientInterface $customerClient
     * @param \Pyz\Yves\Wishlist\Business\AvailabilityReaderInterface $availabilityReader
     */
    public function __construct(WishlistClientInterface $wishlistClient, CustomerClientInterface $customerClient, AvailabilityReaderInterface $availabilityReader)
    {
        $this->wishlistClient = $wishlistClient;
        $this->customerClient = $customerClient;
        $this->availabilityReader = $availabilityReader;
    }

    /**
     * @param string $wishlistName
     * @param \Generated\Shared\Transfer\WishlistItemMetaTransfer[] $wishlistItemMetaTransferCollection
     *
     * @return \Generated\Shared\Transfer\WishlistMoveToCartRequestCollectionTransfer
     */
    public function moveAllAvailableToCart($wishlistName, $wishlistItemMetaTransferCollection)
    {
        $wishlistMoveToCartRequestCollectionTransfer = $this->createMoveAvailableItemsToCartRequestCollection(
            $wishlistName,
            $wishlistItemMetaTransferCollection
        );

        if ($wishlistMoveToCartRequestCollectionTransfer->getRequests()->count() <= 0) {
            return $wishlistMoveToCartRequestCollectionTransfer;
        }

        return $this->wishlistClient->moveCollectionToCart($wishlistMoveToCartRequestCollectionTransfer);
    }

    /**
     * @param string $wishlistName
     * @param \Generated\Shared\Transfer\WishlistItemMetaTransfer[] $wishlistItemMetaTransferCollection
     *
     * @return \Generated\Shared\Transfer\WishlistMoveToCartRequestCollectionTransfer
     */
    protected function createMoveAvailableItemsToCartRequestCollection($wishlistName, $wishlistItemMetaTransferCollection)
    {
        $wishlistMoveToCartRequestCollectionTransfer = new WishlistMoveToCartRequestCollectionTransfer();
        $availabilityBySku = $this->availabilityReader->getAvailability($wishlistItemMetaTransferCollection);

        foreach ($wishlistItemMetaTransferCollection as $wishlistItemMetaTransfer) {
            $wishlistMoveToCartRequestTransfer = $this->createWishlistMoveToCartRequestTransfer(
                $wishlistName,
                $wishlistItemMetaTransfer
            );

            if (!($availabilityBySku[$wishlistItemMetaTransfer->getSku()]) ?? false) {
                continue;
            }

            $wishlistMoveToCartRequestCollectionTransfer->addRequest($wishlistMoveToCartRequestTransfer);
        }

        return $wishlistMoveToCartRequestCollectionTransfer;
    }

    /**
     * @param string $wishlistName
     * @param \Generated\Shared\Transfer\WishlistItemMetaTransfer $wishlistItemMetaTransfer
     *
     * @return \Generated\Shared\Transfer\WishlistMoveToCartRequestTransfer
     */
    protected function createWishlistMoveToCartRequestTransfer($wishlistName, WishlistItemMetaTransfer $wishlistItemMetaTransfer)
    {
        $wishlistItemTransfer = new WishlistItemTransfer();
        $wishlistItemTransfer
            ->setSku($wishlistItemMetaTransfer->getSku())
            ->setWishlistName($wishlistName)
            ->setFkCustomer($this->getIdCustomer());

        $wishlistMoveToCartRequestTransfer = (new WishlistMoveToCartRequestTransfer())
            ->setSku($wishlistItemMetaTransfer->getSku())
            ->setWishlistItem($wishlistItemTransfer);

        return $wishlistMoveToCartRequestTransfer;
    }

    /**
     * @return int
     */
    protected function getIdCustomer()
    {
        return $this->customerClient
            ->getCustomer()
            ->getIdCustomer();
    }
}
