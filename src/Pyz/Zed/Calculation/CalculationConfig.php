<?php

namespace Pyz\Zed\Calculation;

use Spryker\Zed\Calculation\Communication\Plugin\ItemTotalPriceCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\ItemPriceToPayCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\TaxTotalsCalculatorPlugin;
use Spryker\Zed\DiscountCalculationConnector\Communication\Plugin\GrandTotalWithDiscountsTotalsCalculatorPlugin;
use Spryker\Zed\DiscountCalculationConnector\Communication\Plugin\DiscountTotalsCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\ProductOptionPriceToPayCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\ExpensePriceToPayCalculatorPlugin;
use Spryker\Zed\DiscountCalculationConnector\Communication\Plugin\DiscountCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\GrandTotalTotalsCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\SubtotalWithoutItemExpensesTotalsCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\SubtotalTotalsCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\ExpenseTotalsCalculatorPlugin;
use Spryker\Zed\DiscountCalculationConnector\Communication\Plugin\RemoveAllCalculatedDiscountsCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\RemoveAllExpensesCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\RemoveTotalsCalculatorPlugin;
use Spryker\Zed\Calculation\CalculationConfig as SprykerCalculationConfig;
use Spryker\Zed\Calculation\Dependency\Plugin\CalculatorPluginInterface;
use Spryker\Zed\Calculation\Dependency\Plugin\TotalsCalculatorPluginInterface;

class CalculationConfig extends SprykerCalculationConfig
{

    /**
     * @return CalculatorPluginInterface[]|TotalsCalculatorPluginInterface[]
     */
    public function getCalculatorStack()
    {
        return [
            new RemoveTotalsCalculatorPlugin(),
            new RemoveAllExpensesCalculatorPlugin(),
            new RemoveAllCalculatedDiscountsCalculatorPlugin(),
            new ExpenseTotalsCalculatorPlugin(),
            new SubtotalTotalsCalculatorPlugin(),
            new SubtotalWithoutItemExpensesTotalsCalculatorPlugin(),
            new GrandTotalTotalsCalculatorPlugin(),
            new DiscountCalculatorPlugin(),
            new ExpensePriceToPayCalculatorPlugin(),
            new ProductOptionPriceToPayCalculatorPlugin(),
            new DiscountTotalsCalculatorPlugin(),
            new GrandTotalWithDiscountsTotalsCalculatorPlugin(),
            new TaxTotalsCalculatorPlugin(),
            new ItemPriceToPayCalculatorPlugin(),
            new ItemTotalPriceCalculatorPlugin(),
        ];
    }

}
