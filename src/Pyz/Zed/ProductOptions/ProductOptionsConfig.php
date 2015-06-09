<?php

namespace Pyz\Zed\ProductOptions;

use SprykerFeature\Zed\ProductOptions\ProductOptionsConfig as SprykerProductOptionsConfig;

class ProductOptionsConfig extends SprykerProductOptionsConfig
{

    /**
     * @return string
     */
    public function getOptionsDemoDataPath()
    {
        return __DIR__ . '/Business/Internal/DemoData/data/product-options.xml';
    }

    /**
     * @return string
     */
    public function getProductOptionsDemoDataPath()
    {
        return __DIR__ . '/Business/Internal/DemoData/data/product-option-assignments.xml';
    }
}
