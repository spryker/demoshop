<?php

namespace Pyz\Zed\Calculation\Business;

use ProjectA\Zed\Calculation\Business\CalculationSettings as CoreCalculationSettings;
use ProjectA\Zed\Calculation\Dependency\Plugin\CalculatorPluginInterface;
use ProjectA\Zed\Calculation\Dependency\Plugin\TotalsCalculatorPluginInterface;

class CalculationSettings extends CoreCalculationSettings
{
    /**
     * @return CalculatorPluginInterface[]|TotalsCalculatorPluginInterface[]
     */
    public function getCalculatorStack()
    {
        return [
            $this->locator->calculation()->pluginRemoveTotalsCalculatorPlugin(),
            $this->locator->calculation()->pluginRemoveAllExpensesCalculatorPlugin(),
            $this->locator->calculation()->pluginRemoveAllCalculatedDiscountsCalculatorPlugin(),
            $this->locator->calculation()->pluginExpenseTotalsCalculatorPlugin(),
            $this->locator->calculation()->pluginSubtotalTotalsCalculatorPlugin(),
            $this->locator->calculation()->pluginSubtotalWithoutItemExpensesTotalsCalculatorPlugin(),
            $this->locator->calculation()->pluginGrandTotalWithoutDiscountsTotalsCalculatorPlugin(),
            $this->locator->calculation()->pluginExpensePriceToPayCalculatorPlugin(),
            $this->locator->calculation()->pluginItemPriceToPayCalculatorPlugin(),
            $this->locator->calculation()->pluginOptionPriceToPayCalculatorPlugin(),
            $this->locator->calculation()->pluginDiscountTotalsCalculatorPlugin(),
            $this->locator->calculation()->pluginGrandTotalTotalsCalculatorPlugin(),
            $this->locator->calculation()->pluginTaxTotalsCalculatorPlugin(),
        ];
    }
}
