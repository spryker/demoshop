<?php

namespace Pyz\Zed\Product;

use SprykerFeature\Zed\Product\ProductConfig as SprykerProductConfig;

class ProductConfig extends SprykerProductConfig
{

    /**
     * @return string
     */
    public function getDemoDataPath()
    {
        return __DIR__ . '/Business/Internal/DemoData/pets-deli-product-data.csv';
    }

}
