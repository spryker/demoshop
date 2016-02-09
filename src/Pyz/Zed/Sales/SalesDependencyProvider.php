<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Sales;

use Spryker\Zed\ProductOptionDiscountConnector\Communication\Plugin\OrderAmountAggregator\DiscountTotalAmountWithProductOptionsAggregatorPlugin;
use Spryker\Zed\ProductOptionDiscountConnector\Communication\Plugin\OrderAmountAggregator\OrderDiscountsWithProductOptionsAggregatorPlugin;
use Spryker\Zed\ProductOptionDiscountConnector\Communication\Plugin\OrderAmountAggregator\ProductOptionDiscountsAggregatorPlugin;
use Spryker\Zed\Sales\Communication\Plugin\OrderAmountAggregator\OrderExpenseTaxAmountAggregatorPlugin;
use Spryker\Zed\Sales\SalesDependencyProvider as SprykerSalesDependencyProvider;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Sales\Dependency\Plugin\OrderTotalsAggregatePluginInterface;
use Spryker\Zed\Sales\Communication\Plugin\OrderAmountAggregator\ExpenseTotalAggregatorPlugin;
use Spryker\Zed\Sales\Communication\Plugin\OrderAmountAggregator\ItemGrossPriceAggregatorPlugin;
use Spryker\Zed\Sales\Communication\Plugin\OrderAmountAggregator\SubtotalOrderAggregatorPlugin;
use Spryker\Zed\Discount\Communication\Plugin\OrderAmountAggregator\ItemDiscountsOrderAggregatorPlugin;
use Spryker\Zed\Discount\Communication\Plugin\OrderAmountAggregator\DiscountTotalAmountAggregatorPlugin;
use Spryker\Zed\Discount\Communication\Plugin\OrderAmountAggregator\OrderDiscountsAggregatorPlugin;
use Spryker\Zed\Sales\Communication\Plugin\OrderAmountAggregator\GrandTotalAggregatorPlugin;
use Spryker\Zed\Discount\Communication\Plugin\OrderAmountAggregator\OrderGrandTotalWithDiscountsAggregatorPlugin;
use Spryker\Zed\ProductOption\Communication\Plugin\OrderTotalAggregator\ProductOptionsGrossPriceAggregatorPlugin;
use Spryker\Zed\ProductOption\Communication\Plugin\OrderTotalAggregator\SubtotalWithProductOptionsAggregatorPlugin;
use Spryker\Zed\ProductOptionDiscountConnector\Communication\Plugin\OrderAmountAggregator\OrderTaxAmountWithProductOptionsAndDiscountsAggregatorPlugin;
use Spryker\Zed\ProductOptionDiscountConnector\Communication\Plugin\OrderAmountAggregator\ItemsWithProductOptionsAndDiscountsTaxAggregatorPlugin;
use Spryker\Zed\Sales\Communication\Plugin\OrderAmountAggregator\ItemTaxAmountAggregatorPlugin;
use Spryker\Zed\Discount\Communication\Plugin\OrderAmountAggregator\OrderExpenseTaxWithDiscountsAggregatorPlugin;
use Spryker\Zed\Discount\Communication\Plugin\OrderAmountAggregator\OrderExpensesWithDiscountsAggregatorPlugin;

class SalesDependencyProvider extends SprykerSalesDependencyProvider
{

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return array|\Spryker\Zed\Sales\Dependency\Plugin\OrderTotalsAggregatePluginInterface[]
     */
    protected function getItemAmountAggregationPlugins(Container $container)
    {
        return [

            //aggregate sum* fields, so that amount with quantity is available.
            new ItemGrossPriceAggregatorPlugin(),
            new ProductOptionsGrossPriceAggregatorPlugin(),

            //Aggregate item level discounts, stored in CalculatedDiscountTransfer[] tr
            new ItemDiscountsOrderAggregatorPlugin(), //Item and expense discounts
            new ProductOptionDiscountsAggregatorPlugin(),

            ##Add tax for grand total, expenses and items with discounts.
            new ItemTaxAmountAggregatorPlugin(),
            new ItemsWithProductOptionsAndDiscountsTaxAggregatorPlugin(),
        ];

    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return array|\Spryker\Zed\Sales\Dependency\Plugin\OrderTotalsAggregatePluginInterface[]
     */
    protected function getOrderAmountAggregationPlugins(Container $container)
    {
        return [
            //order level expense total amount
            new ExpenseTotalAggregatorPlugin(),
            new OrderExpensesWithDiscountsAggregatorPlugin(),
            new OrderExpenseTaxAmountAggregatorPlugin(),
            new OrderExpenseTaxWithDiscountsAggregatorPlugin(),

            //SubTotal sum of all items before discounts and expenses
            new SubtotalOrderAggregatorPlugin(),
            new SubtotalWithProductOptionsAggregatorPlugin(),

            //Aggregate Discount total amount, stored in DiscountTotalsTransfer
            new DiscountTotalAmountAggregatorPlugin(), //Item and expense discounts
            new DiscountTotalAmountWithProductOptionsAggregatorPlugin(),

            //Aggregate order level discounts, same discounts grouped, store in CalculatedDiscountTransfer[]
            new OrderDiscountsAggregatorPlugin(), //Item and expense discounts
            new OrderDiscountsWithProductOptionsAggregatorPlugin(),

            //Aggregate Grand total amount, subtotal + expenses - discounts
            new GrandTotalAggregatorPlugin(),
            new OrderGrandTotalWithDiscountsAggregatorPlugin(),

            new OrderTaxAmountWithProductOptionsAndDiscountsAggregatorPlugin()
        ];
    }
}
