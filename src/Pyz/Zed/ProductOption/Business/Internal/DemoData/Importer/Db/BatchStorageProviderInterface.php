<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Db;

interface BatchStorageProviderInterface
{

    /**
     * @param string $tableName
     * @param array $columns
     * @param array $values
     *
     * @return void
     */
    public function save($tableName, array $columns, array $values);

}
