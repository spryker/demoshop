<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Calculation;

use Spryker\Zed\Calculation\CalculationDependencyProvider as SprykerCalculationDependencyProvider;
use Spryker\Zed\Calculation\Communication\Plugin\ExpensesGrossSumAmountCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\ExpenseTotalsCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\GrandTotalTotalsCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\ItemGrossAmountsCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\ProductOptionGrossSumCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\RemoveTotalsCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\SubtotalTotalsCalculatorPlugin;
use Spryker\Zed\DiscountCalculationConnector\Communication\Plugin\DiscountCalculatorPlugin;
use Spryker\Zed\DiscountCalculationConnector\Communication\Plugin\DiscountTotalsCalculatorPlugin;
use Spryker\Zed\DiscountCalculationConnector\Communication\Plugin\ExpenseTaxWithDiscountsCalculatorPlugin;
use Spryker\Zed\DiscountCalculationConnector\Communication\Plugin\GrandTotalWithDiscountsCalculatorPlugin;
use Spryker\Zed\DiscountCalculationConnector\Communication\Plugin\RemoveAllCalculatedDiscountsCalculatorPlugin;
use Spryker\Zed\DiscountCalculationConnector\Communication\Plugin\SumGrossCalculatedDiscountAmountCalculatorPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\ProductBundle\Communication\Plugin\Calculation\CalculateBundlePricePlugin;
use Spryker\Zed\ProductOptionDiscountConnector\Communication\Plugin\Calculator\DiscountTotalsWithProductOptionsCalculatorPlugin;
use Spryker\Zed\ProductOptionDiscountConnector\Communication\Plugin\Calculator\ItemsWithProductOptionsAndDiscountsGrossPriceCalculatorPlugin;
use Spryker\Zed\ProductOptionDiscountConnector\Communication\Plugin\Calculator\ItemsWithProductOptionsAndDiscountsTaxCalculatorPlugin;
use Spryker\Zed\ProductOptionDiscountConnector\Communication\Plugin\Calculator\TaxTotalAmountWithProductOptionsAndDiscountsCalculatorPlugin;
use Spryker\Zed\ProductOption\Communication\Plugin\ProductOptionTaxRateCalculatorPlugin;
use Spryker\Zed\Shipment\Communication\Plugin\ShipmentTaxRateCalculatorPlugin;
use Spryker\Zed\TaxProductConnector\Communication\Plugin\ProductItemTaxRateCalculatorPlugin;
use Spryker\Zed\Tax\Communication\Plugin\ExpenseTaxCalculatorPlugin;
use Spryker\Zed\Tax\Communication\Plugin\ItemTaxCalculatorPlugin;
use Spryker\Zed\Tax\Communication\Plugin\TaxTotalsCalculatorPlugin;

class CalculationDependencyProvider extends SprykerCalculationDependencyProvider
{

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Calculation\Dependency\Plugin\CalculatorPluginInterface[]
     */
    protected function getCalculatorStack(Container $container)
    {
        return [
            //Remove calculated values, start with clean state.
            new RemoveTotalsCalculatorPlugin(),
            new RemoveAllCalculatedDiscountsCalculatorPlugin(),

            //Item calculators
            new ItemGrossAmountsCalculatorPlugin(),
            new ProductOptionGrossSumCalculatorPlugin(),
            new ProductItemTaxRateCalculatorPlugin(),
            new ProductOptionTaxRateCalculatorPlugin(),
            new ItemTaxCalculatorPlugin(),

            //SubTotal
            new SubtotalTotalsCalculatorPlugin(),

            //Expenses (e.g. shipping)
            new ExpensesGrossSumAmountCalculatorPlugin(),
            new ShipmentTaxRateCalculatorPlugin(),
            new ExpenseTaxCalculatorPlugin(),
            new ExpenseTotalsCalculatorPlugin(),

            //Grand total
            new GrandTotalTotalsCalculatorPlugin(),

            //Discounts
            new DiscountCalculatorPlugin(),
            new SumGrossCalculatedDiscountAmountCalculatorPlugin(),
            new ItemsWithProductOptionsAndDiscountsGrossPriceCalculatorPlugin(),
            new ItemsWithProductOptionsAndDiscountsTaxCalculatorPlugin(),
            new DiscountTotalsCalculatorPlugin(),
            new DiscountTotalsWithProductOptionsCalculatorPlugin(),
            new ExpenseTaxWithDiscountsCalculatorPlugin(),

            new CalculateBundlePricePlugin(),

            //GrandTotal with discounts
            new GrandTotalWithDiscountsCalculatorPlugin(),

            //TaxTotal
            new TaxTotalsCalculatorPlugin(),
            new TaxTotalAmountWithProductOptionsAndDiscountsCalculatorPlugin(),

        ];
    }

}
