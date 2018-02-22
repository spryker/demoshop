<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Stock;

use Spryker\Zed\Stock\StockConfig as SprykerStockConfig;

class StockConfig extends SprykerStockConfig
{
    /**
     * @return array
     */
    public function getStoreToWarehouseMapping()
    {
        return [
            'DE' => [
                'Warehouse1',
                'Warehouse2',
            ],
            'AT' => [
                'Warehouse2',
            ],
            'US' => [
                'Warehouse2',
            ],
        ];
    }
}
