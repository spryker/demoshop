<?php

namespace Pyz\Zed\Collector\Persistence\Storage\Propel;

use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Orm\Zed\Url\Persistence\Map\SpyRedirectTableMap;
use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use SprykerFeature\Zed\Collector\Persistence\Exporter\AbstractPropelCollectorQuery;

class RedirectCollector extends AbstractPropelCollectorQuery
{

    const KEY_FROM_URL = 'from_url';
    const KEY_TO_URL = 'to_url';
    const KEY_STATUS = 'status';
    const KEY_ID = 'id';

    /**
     * @return void
     */
    protected function prepareQuery()
    {
        $this->touchQuery->addJoin(
            SpyTouchTableMap::COL_ITEM_ID,
            SpyRedirectTableMap::COL_ID_REDIRECT,
            Criteria::INNER_JOIN
        );

        $this->touchQuery->addJoin(
            SpyRedirectTableMap::COL_ID_REDIRECT,
            SpyUrlTableMap::COL_FK_RESOURCE_REDIRECT,
            Criteria::INNER_JOIN
        );

        $this->touchQuery->withColumn(SpyRedirectTableMap::COL_ID_REDIRECT, self::KEY_ID);
        $this->touchQuery->withColumn(SpyUrlTableMap::COL_URL, self::KEY_FROM_URL);
        $this->touchQuery->withColumn(SpyRedirectTableMap::COL_STATUS, self::KEY_STATUS);
        $this->touchQuery->withColumn(SpyRedirectTableMap::COL_TO_URL, self::KEY_TO_URL);
    }

}
