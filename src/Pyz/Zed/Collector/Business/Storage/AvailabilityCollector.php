<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Orm\Zed\Availability\Persistence\Base\SpyAvailabilityQuery;
use Pyz\Zed\Collector\Persistence\Storage\Propel\AvailabilityCollectorQuery;
use Spryker\Shared\Availability\AvailabilityConstants;
use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePropelCollector;

class AvailabilityCollector extends AbstractStoragePropelCollector
{

    const AVAILABLE = 'available';
    const NONE = 'none';
    const ABSTRACT_PRODUCT = 'abstract_product';

    /**
     * @param string $touchKey
     * @param array $collectItemData
     *
     * @return array
     */
    protected function collectItem($touchKey, array $collectItemData)
    {
        return [
            'abstract_quantity' => $collectItemData[AvailabilityCollectorQuery::QUANTITY],
            'concrete_quantity' => $this->getConcreteProductStockQuantity(
                $collectItemData[AvailabilityCollectorQuery::ID_AVAILABILITY_ABSTRACT]
            )
        ];
    }

    /**
     * @param int $idAvailabilityAbstact
     *
     * @return array
     */
    protected function getConcreteProductStockQuantity($idAvailabilityAbstact)
    {
        $productConcreteAvailability = SpyAvailabilityQuery::create()
            ->findByFkAvailabilityAbstract($idAvailabilityAbstact);

        $concreteProductStock = [];
        foreach ($productConcreteAvailability as $availabilityEntity) {
            $concreteProductStock[$availabilityEntity->getSku()] = $availabilityEntity->getQuantity();
        }

        return $concreteProductStock;
    }

    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return AvailabilityConstants::RESOURCE_TYPE_AVAILABILITY_ABSTRACT;
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

}
