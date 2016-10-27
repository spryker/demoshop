<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

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
        return $collectItemData[AvailabilityCollectorQuery::QUANTITY] > 0 ? self::AVAILABLE : self::NONE;
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

    /**
     * @return string
     */
    public function getBundleName()
    {
        return self::ABSTRACT_PRODUCT;
    }

}
