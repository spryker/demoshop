<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

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
