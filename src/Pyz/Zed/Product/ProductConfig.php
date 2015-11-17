<?php

namespace Pyz\Zed\Product;

use SprykerFeature\Zed\Product\ProductConfig as SprykerProductConfig;

class ProductConfig extends SprykerProductConfig
{
    const ABSTRACT_URL_ATTRIBUTES_KEY = 'url';

    /**
     * @return string
     */
    public function getDemoDataPath()
    {
        return __DIR__ . '/Business/Internal/DemoData/pets-deli-product-data.json';
    }

}
