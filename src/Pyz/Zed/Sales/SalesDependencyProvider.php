<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Sales;

use Spryker\Zed\Discount\Communication\Plugin\Sales\DiscountOrderHydratePlugin;
use Spryker\Zed\ProductOption\Communication\Plugin\Sales\ProductOptionOrderHydratePlugin;
use Spryker\Zed\Sales\SalesDependencyProvider as SprykerSalesDependencyProvider;

class SalesDependencyProvider extends SprykerSalesDependencyProvider
{

    /**
     * @return array|\Spryker\Zed\Sales\Dependency\Plugin\HydrateOrderPluginInterface[]
     */
    protected function getHydrateOrderPlugins()
    {
        return [
            new ProductOptionOrderHydratePlugin(),
            new DiscountOrderHydratePlugin(),
        ];
    }

}
