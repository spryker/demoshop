<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector;

use Pyz\Zed\Collector\Persistence\Search\Pdo\PostgreSql\ProductCollector as SearchProductCollector;
use Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql\CategoryNodeCollector;
use Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql\NavigationCollector;
use Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql\ProductCollector;
use Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql\UrlCollector;
use Spryker\Zed\Collector\CollectorConfig as SprykerCollectorConfig;

class CollectorConfig extends SprykerCollectorConfig
{

    /**
     * @return array
     */
    public function getStoragePdoQueryAdapterClassNames($dbEngineName)
    {
        $data = [
            'MySql' => [

            ],
            'PostgreSql' => [
                'CategoryNodeCollector' => CategoryNodeCollector::class,
                'NavigationCollector' => NavigationCollector::class,
                'ProductCollector' => ProductCollector::class,
                'UrlCollector' => UrlCollector::class,
            ]
        ];

        return $data[$dbEngineName];
    }

    /**
     * @return array
     */
    public function getSearchPdoQueryAdapterClassNames($dbEngineName)
    {
        $data = [
            'MySql' => [

            ],
            'PostgreSql' => [
                'ProductCollector' => SearchProductCollector::class,
            ]
        ];

        return $data[$dbEngineName];
    }

}
