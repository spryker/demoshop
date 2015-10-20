<?php

namespace Pyz\Zed\ProductCategory;

use SprykerEngine\Zed\Kernel\AbstractBundleConfig;

class ProductCategoryConfig extends AbstractBundleConfig
{

    /**
     * @return string
     */
    public function getDemoDataCSVPath()
    {
        return __DIR__ . '/Business/Internal/DemoData/pets-deli-product-category-data.csv';
    }

}
