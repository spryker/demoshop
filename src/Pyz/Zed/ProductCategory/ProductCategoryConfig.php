<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductCategory;

use Spryker\Zed\Kernel\AbstractBundleConfig;

class ProductCategoryConfig extends AbstractBundleConfig
{

    /**
     * @return string
     */
    public function getDemoDataCSVPath()
    {
        return __DIR__ . '/Business/Internal/DemoData/demo-product-category-data.csv';
    }

}
