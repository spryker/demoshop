<?php

namespace Pyz\Zed\Collector\Persistence\Storage\Propel;

use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Orm\Zed\Url\Persistence\Map\SpyRedirectTableMap;
use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use SprykerFeature\Zed\Collector\Persistence\Exporter\AbstractPropelCollectorQuery;

class RedirectCollector extends AbstractPropelCollectorQuery
{

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

        $this->touchQuery->withColumn(SpyRedirectTableMap::COL_ID_REDIRECT, 'id');
        $this->touchQuery->withColumn(SpyUrlTableMap::COL_URL, 'from_url');
        $this->touchQuery->withColumn(SpyRedirectTableMap::COL_STATUS, 'status');
        $this->touchQuery->withColumn(SpyRedirectTableMap::COL_TO_URL, 'to_url');
    }

}
