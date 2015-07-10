<?php

namespace Pyz\Zed\ProductOption;

use SprykerFeature\Zed\ProductOption\ProductOptionConfig as SprykerProductOptionConfig;

class ProductOptionConfig extends SprykerProductOptionConfig
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
    public function getProductOptionDemoDataPath()
    {
        return __DIR__ . '/Business/Internal/DemoData/data/product-option-assignments.xml';
    }

}
