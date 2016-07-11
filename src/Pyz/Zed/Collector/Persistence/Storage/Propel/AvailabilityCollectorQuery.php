<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Persistence\Storage\Propel;

use Orm\Zed\Availability\Persistence\Map\SpyAvailabilityTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductTableMap;
use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Spryker\Zed\Collector\Persistence\Collector\AbstractPropelCollectorQuery;

class AvailabilityCollectorQuery extends AbstractPropelCollectorQuery
{

    const ID_PRODUCT = 'id_product';
    const QUANTITY = 'quantity';

    /**
     * @return void
     */
    protected function prepareQuery()
    {
        $this->touchQuery->addJoin(
            SpyTouchTableMap::COL_ITEM_ID,
            SpyAvailabilityTableMap::COL_ID_AVAILABILITY,
            Criteria::INNER_JOIN
        );

        $this->touchQuery->addJoin(
            SpyAvailabilityTableMap::COL_SKU,
            SpyProductTableMap::COL_SKU,
            Criteria::INNER_JOIN
        );

        $this->touchQuery->withColumn(SpyAvailabilityTableMap::COL_QUANTITY, self::QUANTITY);
        $this->touchQuery->withColumn(SpyProductTableMap::COL_ID_PRODUCT, self::ID_PRODUCT);
    }
}
