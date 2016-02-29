<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Product;

use Spryker\Zed\Product\ProductConfig as SprykerProductConfig;

class ProductConfig extends SprykerProductConfig
{

    /**
     * @return string
     */
    public function getDemoDataPath()
    {
        return __DIR__ . '/Business/Internal/DemoData/demo-product-data.xml';
    }

}
