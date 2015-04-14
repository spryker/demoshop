<?php

namespace Pyz\Zed\Product\Business;

use ProjectA\Zed\Product\Business\ProductSettings as SprykerProductSettings;

class ProductSettings extends SprykerProductSettings
{
    /**
     * @return string
     */
    public function getDemoDataPath()
    {
        return __DIR__ . '/Internal/DemoData/demo-product-data.csv';
    }
}
