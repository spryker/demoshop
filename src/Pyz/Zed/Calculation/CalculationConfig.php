<?php

namespace Pyz\Zed\Calculation;

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
            $this->getLocator()->calculation()->pluginRemoveTotalsCalculatorPlugin(),
            $this->getLocator()->calculation()->pluginRemoveAllExpensesCalculatorPlugin(),
            $this->getLocator()->discountCalculationConnector()->pluginRemoveAllCalculatedDiscountsCalculatorPlugin(),
            $this->getLocator()->calculation()->pluginExpenseTotalsCalculatorPlugin(),
            $this->getLocator()->calculation()->pluginSubtotalTotalsCalculatorPlugin(),
            $this->getLocator()->calculation()->pluginSubtotalWithoutItemExpensesTotalsCalculatorPlugin(),
            $this->getLocator()->calculation()->pluginGrandTotalTotalsCalculatorPlugin(),
            $this->getLocator()->calculation()->pluginExpensePriceToPayCalculatorPlugin(),
            $this->getLocator()->calculation()->pluginProductOptionPriceToPayCalculatorPlugin(),
            $this->getLocator()->discountCalculationConnector()->pluginDiscountTotalsCalculatorPlugin(),
            $this->getLocator()->discountCalculationConnector()->pluginGrandTotalWithDiscountsTotalsCalculatorPlugin(),
            $this->getLocator()->calculation()->pluginTaxTotalsCalculatorPlugin(),
            $this->getLocator()->calculation()->pluginItemPriceToPayCalculatorPlugin(),
            $this->getLocator()->calculation()->pluginItemTotalPriceCalculatorPlugin(),
        ];
    }

}
