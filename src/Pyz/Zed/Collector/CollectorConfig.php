<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector;

use Pyz\Zed\Collector\Persistence\Search\Pdo\MySql\CategoryNodeCollectorQuery as MySqlSearchCategoryNodeCollectorQuery;
use Pyz\Zed\Collector\Persistence\Search\Pdo\MySql\ProductCollectorQuery as MySqlSearchProductCollector;
use Pyz\Zed\Collector\Persistence\Search\Pdo\PostgreSql\CategoryNodeCollectorQuery as PostgreSqlSearchCategoryNodeCollectorQuery;
use Pyz\Zed\Collector\Persistence\Search\Pdo\PostgreSql\ProductCollectorQuery as PostgreSqlSearchProductCollector;
use Pyz\Zed\Collector\Persistence\Storage\Pdo\MySql\CategoryNodeCollectorQuery as MySqlStorageCategoryNodeCollectorQuery;
use Pyz\Zed\Collector\Persistence\Storage\Pdo\MySql\NavigationCollectorQuery as MySqlNavigationCollectorQuery;
use Pyz\Zed\Collector\Persistence\Storage\Pdo\MySql\ProductAbstractCollectorQuery as MySqlProductAbstractCollectorQuery;
use Pyz\Zed\Collector\Persistence\Storage\Pdo\MySql\ProductConcreteCollectorQuery as MySqlProductConcreteCollectorQuery;
use Pyz\Zed\Collector\Persistence\Storage\Pdo\MySql\ProductOptionCollectorQuery as MySqlProductOptionCollectorQuery;
use Pyz\Zed\Collector\Persistence\Storage\Pdo\MySql\UrlCollectorQuery as MySqlUrlCollectorQuery;
use Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql\CategoryNodeCollectorQuery as PostgreSqlStorageCategoryNodeCollectorQuery;
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
     * @return array
     */
    public function getStoragePdoQueryAdapterClassNames($dbEngineName)
    {
        $data = [
            'MySql' => [
                'ProductCollectorQuery' => MySqlProductAbstractCollectorQuery::class,
                'ProductConcreteCollectorQuery' => MySqlProductConcreteCollectorQuery::class,
                'CategoryNodeCollectorQuery' => MySqlStorageCategoryNodeCollectorQuery::class,
                'NavigationCollectorQuery' => MySqlNavigationCollectorQuery::class,
                'UrlCollectorQuery' => MySqlUrlCollectorQuery::class,
                'ProductOptionCollectorQuery' => MySqlProductOptionCollectorQuery::class,
            ],
            'PostgreSql' => [
                'ProductCollectorQuery' => ProductAbstractCollectorQuery::class,
                'ProductConcreteCollectorQuery' => ProductConcreteCollectorQuery::class,
                'CategoryNodeCollectorQuery' => PostgreSqlStorageCategoryNodeCollectorQuery::class,
                'NavigationCollectorQuery' => NavigationCollectorQuery::class,
                'UrlCollectorQuery' => UrlCollectorQuery::class,
                'ProductOptionCollectorQuery' => ProductOptionCollectorQuery::class,
            ],
        ];

        return $data[$dbEngineName];
    }

    /**
     * @param string $dbEngineName
     *
     * @return array
     */
    public function getSearchPdoQueryAdapterClassNames($dbEngineName)
    {
        $data = [
            'MySql' => [
                'ProductCollectorQuery' => MySqlSearchProductCollector::class,
                'CategoryNodeCollectorQuery' => MySqlSearchCategoryNodeCollectorQuery::class,
            ],
            'PostgreSql' => [
                'ProductCollectorQuery' => PostgreSqlSearchProductCollector::class,
                'CategoryNodeCollectorQuery' => PostgreSqlSearchCategoryNodeCollectorQuery::class,
            ],
        ];

        return $data[$dbEngineName];
    }

    /**
     * @SuppressWarnings(PHPMD.BooleanGetMethodName)
     *
     * @return bool
     */
    public function getEnablePrepareScopeKeyJoinFixFeatureFlag()
    {
        return true;
    }
}
