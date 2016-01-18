<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Sales;

use Spryker\Zed\Sales\SalesDependencyProvider as SprykerSalesDependencyProvider;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Sales\Dependency\Plugin\OrderTotalsAggregatePluginInterface;
use Spryker\Zed\Sales\Communication\Plugin\OrderAmountAggregator\ExpenseTotalAggregatorPlugin;
use Spryker\Zed\Sales\Communication\Plugin\OrderAmountAggregator\ItemAggregatorPlugin;
use Spryker\Zed\Sales\Communication\Plugin\OrderAmountAggregator\ProductOptionAggregatorPlugin;
use Spryker\Zed\Sales\Communication\Plugin\OrderAmountAggregator\SubtotalOrderAggregatorPlugin;
use Spryker\Zed\Discount\Communication\Plugin\OrderAmountAggregator\ItemDiscountsOrderAggregatorPlugin;
use Spryker\Zed\Discount\Communication\Plugin\OrderAmountAggregator\DiscountTotalAmountAggregatorPlugin;
use Spryker\Zed\Discount\Communication\Plugin\OrderAmountAggregator\OrderDiscountsAggregatorPlugin;
use Spryker\Zed\Tax\Communication\Plugin\ItemTaxOrderAmountAggregatorPlugin;
use Spryker\Zed\Sales\Communication\Plugin\OrderAmountAggregator\GrandTotalAggregatorPlugin;
use Spryker\Zed\Discount\Communication\Plugin\OrderAmountAggregator\OrderGrandTotalWithDiscountsAggregatorPlugin;

class SalesDependencyProvider extends SprykerSalesDependencyProvider
{
    /**
     * @param Container $container
     *
     * @return array|OrderTotalsAggregatePluginInterface[]
     */
    protected function getOrderAmountAggregationPlugins(Container $container)
    {
        return [
            new ExpenseTotalAggregatorPlugin(),
            new ItemAggregatorPlugin(),
            new ProductOptionAggregatorPlugin(),
            new SubtotalOrderAggregatorPlugin(),

            new ItemDiscountsOrderAggregatorPlugin(),
            new DiscountTotalAmountAggregatorPlugin(),
            new OrderDiscountsAggregatorPlugin(),

            new GrandTotalAggregatorPlugin(),
            new OrderGrandTotalWithDiscountsAggregatorPlugin(),

            new ItemTaxOrderAmountAggregatorPlugin(),

        ];
    }
}
