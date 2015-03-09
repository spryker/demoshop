<?php

namespace Pyz\Zed\Calculation\Business;

use \ProjectA\Zed\Calculation\Business\CalculationSettings as CoreCalculationSettings;
use ProjectA\Zed\Calculation\Dependency\Plugin\CalculatorPluginInterface;
use ProjectA\Zed\Calculation\Dependency\Plugin\TotalsCalculatorPluginInterface;

/**
 * Class CalculationSettings
 * @package Pyz\Zed\Calculation\Business
 */
class CalculationSettings extends CoreCalculationSettings
{
    /**
     * @return CalculatorPluginInterface[]|TotalsCalculatorPluginInterface[]
     */
    public function getCalculatorStack()
    {
        return [
            $this->locator->discount()->pluginRemoveTotalsCalculatorPlugin(),
            $this->locator->discount()->pluginRemoveAllExpensesCalculatorPlugin(),
            $this->locator->discount()->pluginRemoveAllCalculatedDiscountsCalculatorPlugin(),
            $this->locator->discount()->pluginExpenseTotalsCalculatorPlugin(),
            $this->locator->discount()->pluginSubtotalTotalsCalculatorPlugin(),
            $this->locator->discount()->pluginSubtotalWithoutItemExpenseTotalsCalculatorPlugin(),
            $this->locator->discount()->pluginGrandTotalWithoutDiscountsTotalsCalculatorPlugin(),
            $this->locator->discount()->pluginExpensePriceToPayCalculatorPlugin(),
            $this->locator->discount()->pluginItemPriceToPayCalculatorPlugin(),
            $this->locator->discount()->pluginOptionPriceToPayCalculatorPlugin(),
            $this->locator->discount()->pluginDiscountTotalsCalculatorPlugin(),
            $this->locator->discount()->pluginGrandTotalTotalsCalculatorPlugin(),
            $this->locator->discount()->pluginTaxTotalsCalculatorPlugin(),
        ];
    }
}
