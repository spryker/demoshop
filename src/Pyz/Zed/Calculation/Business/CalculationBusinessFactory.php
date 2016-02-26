<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Calculation\Business;

use Spryker\Zed\Calculation\Business\CalculationBusinessFactory as SprykerCalculationBusinessFactory;
use Spryker\Zed\DiscountCalculationConnector\Communication\Plugin\DiscountCalculatorPlugin;
use Spryker\Zed\DiscountCalculationConnector\Communication\Plugin\DiscountTotalsCalculatorPlugin;
use Spryker\Zed\DiscountCalculationConnector\Communication\Plugin\GrandTotalWithDiscountsTotalsCalculatorPlugin;
use Spryker\Zed\DiscountCalculationConnector\Communication\Plugin\RemoveAllCalculatedDiscountsCalculatorPlugin;

class CalculationBusinessFactory extends SprykerCalculationBusinessFactory
{
    /**
     * @return \Spryker\Zed\Calculation\Dependency\Plugin\CalculatorPluginInterface[]|\Spryker\Zed\Calculation\Dependency\Plugin\TotalsCalculatorPluginInterface[]
     */
    public function getCalculatorStack()
    {
        return [
            $this->createRemoveTotalsCalculatorPlugin(),
            $this->createRemoveAllExpensesCalculatorPlugin(),
            $this->createRemoveAllCalculatordDiscountsPlugin(),
            $this->createExpenseTotalsCalculatorPlugin(),
            $this->createSubtotalTotalsCalculatorPlugin(),
            $this->createSubtotalWithoutItemExpensesTotalsCalculatorPlugin(),
            $this->createGrandTotalTotalsCalculatorPlugin(),
            $this->createDiscountCalculatorPlugin(),
            $this->createExpensePriceToPayCalculatorPlugin(),
            $this->createProductOptionPriceToPayCalculatorPlugin(),
            $this->createDiscountTotalsCalculatorPlugin(),
            $this->createGrandTotalWithDiscountsCalculatorPlugin(),
            $this->createTaxTotalsCalculatorPlugin(),
            $this->createItemPriceToPayCalculatorPlugin(),
            $this->createItemTotalPriceCalculatorPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\DiscountCalculationConnector\Communication\Plugin\GrandTotalWithDiscountsTotalsCalculatorPlugin;
     */
    protected function createGrandTotalWithDiscountsCalculatorPlugin()
    {
        return new GrandTotalWithDiscountsTotalsCalculatorPlugin();
    }

    /**
     * @return \Spryker\Zed\DiscountCalculationConnector\Communication\Plugin\GrandTotalWithDiscountsTotalsCalculatorPlugin
     */
    protected function createDiscountCalculatorPlugin()
    {
        return new DiscountCalculatorPlugin();
    }

    /**
     * @return \Spryker\Zed\DiscountCalculationConnector\Communication\Plugin\RemoveAllCalculatedDiscountsCalculatorPlugin
     */
    protected function createRemoveAllCalculatordDiscountsPlugin()
    {
        return new RemoveAllCalculatedDiscountsCalculatorPlugin();
    }

    /**
     * @return \Spryker\Zed\DiscountCalculationConnector\Communication\Plugin\DiscountTotalsCalculatorPlugin
     */
    protected function createDiscountTotalsCalculatorPlugin()
    {
        return new DiscountTotalsCalculatorPlugin();
    }
}
