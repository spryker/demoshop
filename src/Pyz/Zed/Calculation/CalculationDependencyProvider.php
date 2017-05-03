<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Calculation;

use Spryker\Zed\Calculation\CalculationDependencyProvider as SprykerCalculationDependencyProvider;
use Spryker\Zed\Calculation\Communication\Plugin\Calculator\DiscountAmountAggregatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\Calculator\DiscountTotalCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\Calculator\ExpenseTotalCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\Calculator\GrandTotalCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\Calculator\ItemDiscountAmountFullAggregatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\Calculator\PriceCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\Calculator\PriceToPayAggregatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\Calculator\ItemProductOptionPriceAggregatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\Calculator\ItemSubtotalAggregatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\Calculator\ItemTaxAmountFullAggregatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\Calculator\RefundableAmountCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\Calculator\RefundTotalCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\Calculator\SubtotalCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\Calculator\TaxTotalCalculatorPlugin;
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
use Spryker\Zed\Calculation\Communication\Plugin\Calculator\TaxAmountCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\Calculator\CanceledTotalCalculationPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\Calculator\TaxRateAverageAggregatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\Calculator\TaxAmountAfterCancellationCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\Calculator\OrderTaxTotalCalculationPlugin;

class CalculationDependencyProvider extends SprykerCalculationDependencyProvider
{

    /**
     * This calculator stack working with quote object which happens to be processed in cart/checkout
     *
     * You can view calculated values in: http://www.de.project.local/calculation/debug. For this to work you must have items in cart.
     *
     * RemoveTotalsCalculatorPlugin - Reset TotalsTransfer object
     *
     * RemoveAllCalculatedDiscountsCalculatorPlugin - Reset CalculateDiscounts for:
     *   - Item.calculatedDiscounts
     *   - Item.productOption.calculatedDiscounts
     *   - Expense.calculatedDiscounts
     *
     * PriceCalculatorPlugin - Calculates price based on tax mode, tax mode is set in this calculator based on CalculationConstants::TAX_MODE configuration key.
     *    - Item.unitPrice
     *    - Item.sumPrice
     *    - Item.productOption.unitPrice
     *    - Item.productOption.sumPrice
     *    - Expense.unitPrice
     *    - Expense.sumPrice
     *  When "gross" mode:
     *    - Item.sumGrossPrice
     *    - Item.productOption.sumGrossPrice
     *    - Expense.sumGrossPrice
     *  When "Net" mode:
     *    - Item.sumNetPrice
     *    - Item.productOption.sumNetPrice
     *    - Expense.sumNetPrice
     *
     * ItemProductOptionPriceAggregatorPlugin - Item option price sum total
     *    - Item.unitProductOptionAggregation
     *    - Item.sumProductOptionAggregation
     *
     * ItemSubtotalAggregatorPlugin - Total price amount (item + options + item expenses)
     *    - Item.unitSubtotal
     *    - Item.sumSubtotal
     *
     * SubtotalCalculatorPlugin - Sum of item sumAggregation
     *    - Total.subtotal
     *
     * DiscountCalculatorPlugin - Discount bundle calculator, runs cart rules/applies voucher codes.
     *    - Item.calculatedDiscounts[].unitGrossAmount
     *    - Item.productOptions.calculatedDiscounts[].unitGrossAmount
     *    - Expense.calculatedDiscounts[].unitGrossAmount
     *
     * DiscountAmountAggregatorPlugin - Sums all discounts for corresponding object
     *    - Item.unitDiscountAmountAggregation
     *    - Item.sumDiscountAmountAggregation
     *    - Item.productOptions.unitDiscountAmountAggregation
     *    - Item.productOptions.sumDiscountAmountAggregation
     *    - Expense.unitDiscountAmountAggregation
     *    - Expense.sumDiscountAmountAggregation
     *
     *    - Item.calculatedDiscounts[].sumGrossAmount
     *    - Item.productOptions.calculatedDiscounts[].sumGrossAmount
     *    - Expense.calculatedDiscounts[].sumGrossAmount
     *
     * ItemDiscountAmountFullAggregatorPlugin - Sums item all discounts with additions (option and item expense discounts)
     *    - Item.unitDiscountAmountFullAggregation
     *    - Item.sumDiscountAmountFullAggregation
     *
     * PriceToPayAggregatorPlugin - Final price customer have to pay after discounts
     *    - Item.unitPriceToPayAggregation
     *    - Item.sumPriceToPayAggregation
     *    - Expense.unitPriceToPayAggregation
     *    - Expense.sumPriceToPayAggregation
     *
     * ProductItemTaxRateCalculatorPlugin - Sets tax rate to item based on shipping address
     *    - Item.taxRate
     *
     * ProductOptionTaxRateCalculatorPlugin - Sets tax rate to expense based on shipping address
     *    - Item.productOptions[].taxRate
     *
     * ShipmentTaxRateCalculatorPlugin - Sets tax rate to expense based on shipping address
     *    - Expense.taxRate
     *
     * TaxAmountCalculatorPlugin - Calculates tax amount based on tax mode after discounts
     *    - Item.unitTaxAmount
     *    - Item.sumTaxAmount
     *    - Item.productOptions[].unitTaxAmount
     *    - Item.productOptions[].sumTaxAmount
     *    - Expense.unitTaxAmount
     *    - Expense.sumTaxAmount
     *
     * ItemTaxAmountFullAggregatorPlugin - Calculate for all item additions
     *    - Item.unitTaxAmountFullAggregation
     *    - Item.sumTaxAmountFullAggregation
     *
     * TaxRateAverageAggregatorPlugin - Calculate tax rate average aggregation used when recalculating taxable amount after refund
     *    - Item.taxRateAverageAggregation
     *
     * RefundableAmountCalculatorPlugin - Calculate refundable for each item and expenses
     *    - Item.refundableAmount
     *    - Expense.refundableAmount
     *
     * CalculateBundlePricePlugin -  Calculate bundle item total, from bundled items
     *    - BundledItem.unitPrice
     *    - BundledItem.sumPrice
     *    - BundledItem.unitGrossPrice
     *    - BundledItem.sumGrossPrice
     *    - BundledItem.unitNetPrice
     *    - BundledItem.sumNetPrice
     *    – BundledItem.unitTaxAmountFullAggregation
     *    - BundledItem.sumTaxAmountFullAggregation
     *    - BundledItem.unitTaxAmountAggregation
     *    - BundledItem.sumTaxAmountAggregation
     *
     * ExpenseTotalCalculatorPlugin - Calculate order expenses total
     *    - Totals.expenseTotal
     *
     * DiscountTotalCalculatorPlugin - Calculate discount total
     *    - Totals.discountTotal
     *
     * RefundTotalCalculatorPlugin - Calculate refund total
     *    - Totals.refundTotal
     *
     * GrandTotalCalculatorPlugin - Calculate grand total
     *    - Totals.grandTotal
     *
     * TaxTotalCalculatorPlugin - Total tax amount
     *    - Totals.taxTotal.amount
     *
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Calculation\Dependency\Plugin\CalculationPluginInterface[]
     */
    protected function getQuoteCalculatorPluginStack(Container $container)
    {
        return [
            new RemoveTotalsCalculatorPlugin(),
            new RemoveAllCalculatedDiscountsCalculatorPlugin(),

            new PriceCalculatorPlugin(),
            new ItemProductOptionPriceAggregatorPlugin(),

            new ItemSubtotalAggregatorPlugin(),

            new SubtotalCalculatorPlugin(),

            new DiscountCalculatorPlugin(),
            new DiscountAmountAggregatorPlugin(),
            new ItemDiscountAmountFullAggregatorPlugin(),

            new ProductItemTaxRateCalculatorPlugin(),
            new ProductOptionTaxRateCalculatorPlugin(),
            new ShipmentTaxRateCalculatorPlugin(),
            new TaxAmountCalculatorPlugin(),
            new ItemTaxAmountFullAggregatorPlugin(),

            new PriceToPayAggregatorPlugin(),

            new TaxRateAverageAggregatorPlugin(),

            new RefundableAmountCalculatorPlugin(),

            new CalculateBundlePricePlugin(),

            new ExpenseTotalCalculatorPlugin(),
            new DiscountTotalCalculatorPlugin(),
            new RefundTotalCalculatorPlugin(),
            new GrandTotalCalculatorPlugin(),

            new TaxTotalCalculatorPlugin(),
        ];
    }

    /**
     * This calculator plugin stack working with order object which happens to be created after order is placed
     *
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Calculation\Dependency\Plugin\CalculationPluginInterface[]
     */
    protected function getOrderCalculatorPluginStack(Container $container)
    {
        return [

            new PriceCalculatorPlugin(),
            new ItemProductOptionPriceAggregatorPlugin(),
            new ItemSubtotalAggregatorPlugin(),

            new SubtotalCalculatorPlugin(),

            new DiscountAmountAggregatorPlugin(),
            new ItemDiscountAmountFullAggregatorPlugin(),

            new PriceToPayAggregatorPlugin(),

            new TaxAmountAfterCancellationCalculatorPlugin(),

            new RefundableAmountCalculatorPlugin(),

            new ExpenseTotalCalculatorPlugin(),
            new DiscountTotalCalculatorPlugin(),
            new RefundTotalCalculatorPlugin(),
            new CanceledTotalCalculationPlugin(),
            new GrandTotalCalculatorPlugin(),

            new OrderTaxTotalCalculationPlugin(),

        ];
    }

}
