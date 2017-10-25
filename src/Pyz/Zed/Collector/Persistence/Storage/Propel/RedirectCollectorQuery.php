<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Persistence\Storage\Propel;

use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Orm\Zed\Url\Persistence\Map\SpyUrlRedirectTableMap;
use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Spryker\Zed\Collector\Persistence\Collector\AbstractPropelCollectorQuery;

class RedirectCollectorQuery extends AbstractPropelCollectorQuery
{
    /**
     * @return void
     */
    protected function prepareQuery()
    {
        $this->touchQuery->addJoin(
            SpyTouchTableMap::COL_ITEM_ID,
            SpyUrlRedirectTableMap::COL_ID_URL_REDIRECT,
            Criteria::INNER_JOIN
        );
        $this->touchQuery->addJoin(
            SpyUrlRedirectTableMap::COL_ID_URL_REDIRECT,
            SpyUrlTableMap::COL_FK_RESOURCE_REDIRECT,
            Criteria::INNER_JOIN
        );

        $this->touchQuery->addAnd(
            SpyUrlTableMap::COL_FK_LOCALE,
            $this->getLocale()->getIdLocale(),
            Criteria::EQUAL
        );

        $this->touchQuery->withColumn(SpyUrlRedirectTableMap::COL_ID_URL_REDIRECT, 'id');
        $this->touchQuery->withColumn(SpyUrlTableMap::COL_URL, 'from_url');
        $this->touchQuery->withColumn(SpyUrlRedirectTableMap::COL_STATUS, 'status');
        $this->touchQuery->withColumn(SpyUrlRedirectTableMap::COL_TO_URL, 'to_url');
    }
}
