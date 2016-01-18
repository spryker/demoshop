<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Calculation;

use Spryker\Zed\Calculation\CalculationDependencyProvider as SprykerCalculationDependencyProvider;
use Spryker\Zed\Calculation\Communication\Plugin\ExpenseTotalsCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\GrandTotalTotalsCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\ItemGrossAmountsCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\ProductOptionGrossSumCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\RemoveAllExpensesCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\RemoveTotalsCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\SubtotalTotalsCalculatorPlugin;
use Spryker\Zed\DiscountCalculationConnector\Communication\Plugin\DiscountCalculatorPlugin;
use Spryker\Zed\DiscountCalculationConnector\Communication\Plugin\DiscountTotalsCalculatorPlugin;
use Spryker\Zed\DiscountCalculationConnector\Communication\Plugin\RemoveAllCalculatedDiscountsCalculatorPlugin;
use Spryker\Zed\DiscountCalculationConnector\Communication\Plugin\GrandTotalWithDiscountsCalculatorPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Calculation\Dependency\Plugin\CalculatorPluginInterface;
use Spryker\Zed\Tax\Communication\Plugin\TaxTotalsCalculatorPlugin;
use Spryker\Zed\Calculation\Business\Model\Calculator\ExpenseGrossSumAmountCalculator; //@todo move to plugin

class CalculationDependencyProvider extends SprykerCalculationDependencyProvider
{
    /**
     * @param Container $container
     * @return CalculatorPluginInterface[]
     */
    protected function getCalculatorStack(Container $container)
    {
        return [
            #Remove calculated values, start with clean state.
            new RemoveTotalsCalculatorPlugin(),
            new RemoveAllExpensesCalculatorPlugin(),
            new RemoveAllCalculatedDiscountsCalculatorPlugin(),

            #Item calculators
            new ProductOptionGrossSumCalculatorPlugin(),
            new ItemGrossAmountsCalculatorPlugin(),

            #SubTotal
            new SubtotalTotalsCalculatorPlugin(),

            #Expenses (e.g. shipping)
            new ExpenseGrossSumAmountCalculator(),
            new ExpenseTotalsCalculatorPlugin(),

            #Discounts
            new DiscountCalculatorPlugin(),
            new DiscountTotalsCalculatorPlugin(),

            #GrandTotal
            new GrandTotalTotalsCalculatorPlugin(),
            new GrandTotalWithDiscountsCalculatorPlugin(),

            #TaxTotal
            new TaxTotalsCalculatorPlugin(),

        ];
    }
}
