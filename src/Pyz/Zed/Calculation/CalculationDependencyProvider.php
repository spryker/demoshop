<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Calculation;

use Spryker\Zed\Calculation\CalculationDependencyProvider as SprykerCalculationDependencyProvider;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Calculation\Dependency\Plugin\CalculatorPluginInterface;

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
            $container->getLocator()->calculation()->pluginRemoveTotalsCalculatorPlugin(),
            $container->getLocator()->calculation()->pluginRemoveAllExpensesCalculatorPlugin(),
            $container->getLocator()->discountCalculationConnector()->pluginRemoveAllCalculatedDiscountsCalculatorPlugin(),

            #Item calculators
            $container->getLocator()->calculation()->pluginProductOptionGrossSumCalculatorPlugin(),
            $container->getLocator()->calculation()->pluginItemGrossAmountsCalculatorPlugin(),

            #SubTotal
            $container->getLocator()->calculation()->pluginSubtotalTotalsCalculatorPlugin(),

            #Expenses (e.g. shipping)
            $container->getLocator()->calculation()->pluginExpenseTotalsCalculatorPlugin(),

            #Discounts
            $container->getLocator()->discountCalculationConnector()->pluginDiscountCalculatorPlugin(),
            $container->getLocator()->discountCalculationConnector()->pluginDiscountTotalsCalculatorPlugin(),

            #GrandTotal
            $container->getLocator()->calculation()->pluginGrandTotalTotalsCalculatorPlugin(),
            $container->getLocator()->discountCalculationConnector()->pluginGrandTotalWithDiscountsCalculatorPlugin(),

            #TaxTotal
            $container->getLocator()->tax()->pluginTaxTotalsCalculatorPlugin(),

        ];
    }
}
