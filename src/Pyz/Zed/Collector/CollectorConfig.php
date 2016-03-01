<?php

namespace Pyz\Zed\Collector;

use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Zed\Collector\CollectorConfig as SprykerCollectorConfig;

class CollectorConfig extends SprykerCollectorConfig
{

    /**
     * @throws \UnexpectedValueException
     *
     * @return string
     */
    public function getCurrentDatabaseEngineName()
    {
        $dbEngine = $this->get(ApplicationConstants::ZED_DB_ENGINE);
        $supportedEngines = $this->get(ApplicationConstants::ZED_DB_SUPPORTED_ENGINES);

        if (!array_key_exists($dbEngine, $supportedEngines)) {
            throw new \UnexpectedValueException('Unsupported database engine: ' . $dbEngine);
        }

        return $supportedEngines[$dbEngine];
    }

    /**
     * @return array
     */
    public function getStoragePdoQueryAdapterClassNames()
    {
        $engine = $this->getCurrentDatabaseEngineName();

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

        return $data[$engine];
    }

    /**
     * @return array
     */
    public function getSearchPdoQueryAdapterClassNames()
    {
        $engine = $this->get(ApplicationConstants::ZED_DB_ENGINE);

        $data = [
            'MySql' => [

            ],
            'PostgreSql' => [
                'ProductCollector' => \Pyz\Zed\Collector\Persistence\Search\Pdo\PostgreSql\ProductCollector::class,
            ]
        ];

        return $data[$engine];
    }

}
