<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Db;

interface BatchStorageProviderInterface
{

    /**
     * @param string $tableName
     * @param array $columns
     * @param array $values
     */
    public function save($tableName, array $columns, array $values);
}
