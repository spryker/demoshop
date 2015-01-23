<?php

namespace Pyz\Zed\Calculation\Business;

use \ProjectA\Zed\Calculation\Business\CalculationSettings as CoreCalculationSettings;
use ProjectA\Zed\Calculation\Business\Model\Calculator\CalculatorInterface;
use ProjectA\Zed\Calculation\Business\Model\Calculator\TotalsCalculatorInterface;
use ProjectA\Zed\Calculation\Communication\Plugin\DiscountTotalsCalculatorPlugin;
use ProjectA\Zed\Calculation\Communication\Plugin\ExpensePriceToPayCalculatorPlugin;
use ProjectA\Zed\Calculation\Communication\Plugin\ExpenseTotalsCalculatorPlugin;
use ProjectA\Zed\Calculation\Communication\Plugin\GrandTotalTotalsCalculatorPlugin;
use ProjectA\Zed\Calculation\Communication\Plugin\GrandTotalWithoutDiscountsTotalsCalculatorPlugin;
use ProjectA\Zed\Calculation\Communication\Plugin\ItemPriceToPayCalculatorPlugin;
use ProjectA\Zed\Calculation\Communication\Plugin\OptionPriceToPayCalculatorPlugin;
use ProjectA\Zed\Calculation\Communication\Plugin\RemoveAllCalculatedDiscountsCalculatorPlugin;
use ProjectA\Zed\Calculation\Communication\Plugin\RemoveAllExpensesCalculatorPlugin;
use ProjectA\Zed\Calculation\Communication\Plugin\RemoveTotalsCalculatorPlugin;
use ProjectA\Zed\Calculation\Communication\Plugin\SubtotalTotalsCalculatorPlugin;
use ProjectA\Zed\Calculation\Communication\Plugin\SubtotalWithoutItemExpensesTotalsCalculatorPlugin;
use ProjectA\Zed\Calculation\Communication\Plugin\TaxTotalsCalculatorPlugin;

/**
 * Class CalculationSettings
 * @package Pyz\Zed\Calculation\Business
 */
class CalculationSettings extends CoreCalculationSettings
{
    /**
     * @return array|\ProjectA\Zed\Calculation\Business\Model\Calculator\CalculatorInterface[]|\ProjectA\Zed\Calculation\Business\Model\Calculator\TotalsCalculatorInterface[]
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
            new GrandTotalWithoutDiscountsTotalsCalculatorPlugin(),
            // Salesrule
            new ExpensePriceToPayCalculatorPlugin(),
            new ItemPriceToPayCalculatorPlugin(),
            new OptionPriceToPayCalculatorPlugin(),
            new DiscountTotalsCalculatorPlugin(),
            new GrandTotalTotalsCalculatorPlugin(),
            new TaxTotalsCalculatorPlugin(),
        ];
    }

}
