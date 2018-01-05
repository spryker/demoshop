<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Econda;

use Exception;
use Pyz\Zed\Econda\Persistence\Storage\Pdo\PostgreSql\CategoryNodeEcondaQuery as StorageCategoryNodeEcondaQuery;
use Pyz\Zed\Econda\Persistence\Storage\Pdo\PostgreSql\ProductConcreteEcondaQuery as StorageProductConcreteEcondaQuery;
use SprykerEco\Zed\Econda\EcondaConfig as SprykerEcondaConfig;

class EcondaConfig extends SprykerEcondaConfig
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

            ],
            'PostgreSql' => [
                'CategoryNodeEcondaQuery' => StorageCategoryNodeEcondaQuery::class,
                'ProductConcreteEcondaQuery' => StorageProductConcreteEcondaQuery::class,
            ],
        ];

        return $data[$dbEngineName];
    }

    /**
     * @param string $pdoEcondaQueryName
     * @param string $dbEngineName
     *
     * @throws \Exception
     *
     * @return string
     */
    public function getPdoEcondaQueryClassName($pdoEcondaQueryName, $dbEngineName)
    {
        $dbEngineQueries = $this->getStoragePdoQueryAdapterClassNames($dbEngineName);

        if (!isset($dbEngineQueries[$pdoEcondaQueryName])) {
            throw new Exception('Invalid PdoEcondaQueryName name: ' . $pdoEcondaQueryName);
        }

        return $dbEngineQueries[$pdoEcondaQueryName];
    }
}
