<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector;

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
                'CategoryNodeCollector' => \Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql\CategoryNodeCollector::class,
                'NavigationCollector' => \Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql\NavigationCollector::class,
                'ProductCollector' => \Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql\ProductCollector::class,
                'UrlCollector' => \Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql\UrlCollector::class,
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
                'ProductCollector' => \Pyz\Zed\Collector\Persistence\Search\Pdo\PostgreSql\ProductCollector::class,
            ]
        ];

        return $data[$dbEngineName];
    }

}
