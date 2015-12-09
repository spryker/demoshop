<?php

namespace Pyz\Zed\Calculation;

use SprykerFeature\Zed\Calculation\Communication\Plugin\ItemTotalPriceCalculatorPlugin;
use SprykerFeature\Zed\Calculation\Communication\Plugin\ItemPriceToPayCalculatorPlugin;
use SprykerFeature\Zed\Calculation\Communication\Plugin\TaxTotalsCalculatorPlugin;
use SprykerFeature\Zed\DiscountCalculationConnector\Communication\Plugin\GrandTotalWithDiscountsTotalsCalculatorPlugin;
use SprykerFeature\Zed\DiscountCalculationConnector\Communication\Plugin\DiscountTotalsCalculatorPlugin;
use SprykerFeature\Zed\Calculation\Communication\Plugin\ProductOptionPriceToPayCalculatorPlugin;
use SprykerFeature\Zed\Calculation\Communication\Plugin\ExpensePriceToPayCalculatorPlugin;
use SprykerFeature\Zed\DiscountCalculationConnector\Communication\Plugin\DiscountCalculatorPlugin;
use SprykerFeature\Zed\Calculation\Communication\Plugin\GrandTotalTotalsCalculatorPlugin;
use SprykerFeature\Zed\Calculation\Communication\Plugin\SubtotalWithoutItemExpensesTotalsCalculatorPlugin;
use SprykerFeature\Zed\Calculation\Communication\Plugin\SubtotalTotalsCalculatorPlugin;
use SprykerFeature\Zed\Calculation\Communication\Plugin\ExpenseTotalsCalculatorPlugin;
use SprykerFeature\Zed\DiscountCalculationConnector\Communication\Plugin\RemoveAllCalculatedDiscountsCalculatorPlugin;
use SprykerFeature\Zed\Calculation\Communication\Plugin\RemoveAllExpensesCalculatorPlugin;
use SprykerFeature\Zed\Calculation\Communication\Plugin\RemoveTotalsCalculatorPlugin;
use SprykerFeature\Zed\Calculation\CalculationConfig as SprykerCalculationConfig;
use SprykerFeature\Zed\Calculation\Dependency\Plugin\CalculatorPluginInterface;
use SprykerFeature\Zed\Calculation\Dependency\Plugin\TotalsCalculatorPluginInterface;

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
