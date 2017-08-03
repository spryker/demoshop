<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\Mapper;

use Generated\Shared\Transfer\StorageProductTransfer;
use Spryker\Client\Availability\AvailabilityClientInterface;

class StorageProductAvailabilityMapper implements StorageProductAvailabilityMapperInterface
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
     * @param \Generated\Shared\Transfer\StorageProductTransfer $storageProductTransfer
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    public function mapAvailability(StorageProductTransfer $storageProductTransfer)
    {
        $storageAvailabilityTransfer = $this->availabilityClient->getProductAvailabilityByIdProductAbstract($storageProductTransfer->getIdProductAbstract());

        if (!$storageProductTransfer->getIsVariant()) {
            $storageProductTransfer->setAvailable($storageAvailabilityTransfer->getIsAbstractProductAvailable());

            return $storageProductTransfer;
        }

        $concreteProductAvailableItems = $storageAvailabilityTransfer->getConcreteProductAvailableItems();
        if (isset($concreteProductAvailableItems[$storageProductTransfer->getSku()])) {
            $storageProductTransfer->setAvailable($concreteProductAvailableItems[$storageProductTransfer->getSku()]);
        }

        return $storageProductTransfer;
    }

}
