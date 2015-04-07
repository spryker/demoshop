<?php


namespace Pyz\Zed\ProductCategory\Business;


class ProductCategorySettings
{
    /**
     * @return string
     */
    public function getDemoDataCSVPath()
    {
        return __DIR__ . '/Internal/DemoData/demo-product-category-data.csv';
    }
}
