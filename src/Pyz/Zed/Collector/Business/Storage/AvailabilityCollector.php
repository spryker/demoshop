<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\StorageAvailabilityTransfer;
use Orm\Zed\Availability\Persistence\Base\SpyAvailabilityQuery;
use Orm\Zed\Availability\Persistence\SpyAvailability;
use Pyz\Zed\Collector\Persistence\Storage\Propel\AvailabilityCollectorQuery;
use Spryker\Shared\Availability\AvailabilityConfig;
use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePropelCollector;

class AvailabilityCollector extends AbstractStoragePropelCollector
{

    /**
     * @param string $touchKey
     * @param array $collectItemData
     *
     * @return array
     */
    protected function collectItem($touchKey, array $collectItemData)
    {
        $concreteProductsAvailability = $this->getConcreteProductsAvailability(
            $collectItemData[AvailabilityCollectorQuery::ID_AVAILABILITY_ABSTRACT]
        );

        return [
            StorageAvailabilityTransfer::IS_ABSTRACT_PRODUCT_AVAILABLE => $this->isProductAbstractAvailable($concreteProductsAvailability),
            StorageAvailabilityTransfer::CONCRETE_PRODUCT_AVAILABLE_ITEMS => $concreteProductsAvailability,
        ];
    }

    /**
     * @param int $idAvailabilityAbstact
     *
     * @return array
     */
    protected function getConcreteProductsAvailability($idAvailabilityAbstact)
    {
        $productConcreteAvailability = SpyAvailabilityQuery::create()
            ->findByFkAvailabilityAbstract($idAvailabilityAbstact);

        $concreteProductStock = [];
        foreach ($productConcreteAvailability as $availabilityEntity) {
            $concreteProductStock[$availabilityEntity->getSku()] = $this->isProductConcreteAvailable($availabilityEntity);
        }

        return $concreteProductStock;
    }

    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return AvailabilityConfig::RESOURCE_TYPE_AVAILABILITY_ABSTRACT;
    }

    /**
     * @param array $data
     * @param string $localeName
     * @param array $collectedItemData
     *
     * @return string
     */
    protected function collectKey($data, $localeName, array $collectedItemData)
    {
        return $this->generateKey($collectedItemData[AvailabilityCollectorQuery::ID_PRODUCT_ABSTRACT], $localeName);
    }

    /**
     * @param array $concreteProductsAvailability
     *
     * @return bool
     */
    protected function isProductAbstractAvailable(array $concreteProductsAvailability)
    {
        foreach ($concreteProductsAvailability as $isConcreteAvailable) {
            if ($isConcreteAvailable) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param \Orm\Zed\Availability\Persistence\SpyAvailability $availabilityEntity
     *
     * @return bool
     */
    protected function isProductConcreteAvailable(SpyAvailability $availabilityEntity)
    {
        return $availabilityEntity->getQuantity() > 0 || $availabilityEntity->getIsNeverOutOfStock();
    }

}
