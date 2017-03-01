<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector;

use Pyz\Zed\Collector\Persistence\Search\Pdo\PostgreSql\CategoryNodeCollectorQuery as SearchCategoryNodeCollectorQuery;
use Pyz\Zed\Collector\Persistence\Search\Pdo\PostgreSql\CmsPageCollectorQuery;
use Pyz\Zed\Collector\Persistence\Search\Pdo\PostgreSql\ProductCollectorQuery as SearchProductCollector;
use Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql\CategoryNodeCollectorQuery as StorageCategoryNodeCollectorQuery;
use Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql\NavigationCollectorQuery;
use Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql\ProductAbstractCollectorQuery;
use Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql\ProductConcreteCollectorQuery;
use Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql\ProductOptionCollectorQuery;
use Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql\UrlCollectorQuery;
use Spryker\Zed\Collector\CollectorConfig as SprykerCollectorConfig;

class CollectorConfig extends SprykerCollectorConfig
{

    /**
     * @param string $dbEngineName
     *
     * @return mixed
     */
    public function getStoragePdoQueryAdapterClassNames($dbEngineName)
    {
        $data = [
            'MySql' => [

            ],
            'PostgreSql' => [
                'CategoryNodeCollectorQuery' => StorageCategoryNodeCollectorQuery::class,
                'NavigationCollectorQuery' => NavigationCollectorQuery::class,
                'ProductCollectorQuery' => ProductAbstractCollectorQuery::class,
                'UrlCollectorQuery' => UrlCollectorQuery::class,
                'ProductConcreteCollectorQuery' => ProductConcreteCollectorQuery::class,
                'ProductOptionCollectorQuery' => ProductOptionCollectorQuery::class,
            ],
        ];

        return $data[$dbEngineName];
    }

    /**
     * @param string $dbEngineName
     *
     * @return mixed
     */
    public function getSearchPdoQueryAdapterClassNames($dbEngineName)
    {
        $data = [
            'MySql' => [

            ],
            'PostgreSql' => [
                'ProductCollectorQuery' => SearchProductCollector::class,
                'CategoryNodeCollectorQuery' => SearchCategoryNodeCollectorQuery::class,
                'CmsPageCollectorQuery' => CmsPageCollectorQuery::class,
            ],
        ];

        return $data[$dbEngineName];
    }

    /**
     * @return bool
     */
    public function isPrepareScopeKeyJoinFixFeatureEnabled()
    {
        return true;
    }

}
