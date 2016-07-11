<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Spryker\Shared\Availability\AvailabilityConstants;
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
        return $collectItemData['quantity'] > 0;
    }

    /**
     * @return string
     */
    protected function collectResourceType()
    {
       return 'availability';
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
        return $this->generateKey($collectedItemData['id_product'], $localeName);
    }

    /**
     * @return string
     */
    public function getBundleName()
    {
        return 'concrete_product';
    }

}
