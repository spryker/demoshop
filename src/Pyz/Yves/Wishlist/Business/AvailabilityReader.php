<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Wishlist\Business;

use Spryker\Client\Availability\AvailabilityClientInterface;

class AvailabilityReader implements AvailabilityReaderInterface
{
    /**
     * @var \Spryker\Client\Availability\AvailabilityClientInterface
     */
    protected $availabilityClient;

    /**
     * @param \Spryker\Client\Availability\AvailabilityClientInterface $availabilityClient
     */
    public function __construct(AvailabilityClientInterface $availabilityClient)
    {
        $this->availabilityClient = $availabilityClient;
    }

    /**
     * @param \Generated\Shared\Transfer\WishlistItemMetaTransfer[] $wishlistItemMetaTransferCollection
     *
     * @return array
     */
    public function getAvailability($wishlistItemMetaTransferCollection)
    {
        $availability = [];

        foreach ($wishlistItemMetaTransferCollection as $wishlistItemMetaTransfer) {
            $sku = $wishlistItemMetaTransfer->getSku();
            $idProductAbstract = $wishlistItemMetaTransfer->getIdProductAbstract();

            $storageAvailabilityTransfer = $this->availabilityClient->getProductAvailabilityByIdProductAbstract($idProductAbstract);
            $isAvailable = $storageAvailabilityTransfer->getConcreteProductAvailableItems()[$sku];

            $availability[$sku] = $isAvailable;
        }

        return $availability;
    }
}
