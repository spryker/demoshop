<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Zed\Calculation\Business;

use ArrayObject;
use Codeception\TestCase\Test;
use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CurrencyTransfer;
use Generated\Shared\Transfer\DiscountTransfer;
use Generated\Shared\Transfer\ExpenseTransfer;
use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\ProductOptionTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Shared\Calculation\CalculationPriceMode;
use Spryker\Zed\Discount\DiscountDependencyProvider;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Zed
 * @group Calculation
 * @group Business
 * @group Facade
 * @group CalculationWithCalculableObjectFacadeTest
 * Add your own group annotations below this line
 */
class CalculationWithCalculableObjectFacadeTest extends Test
{
    /**
     * @var \PyzTest\Zed\Calculation\CalculationBusinessTester
     */
    protected $tester;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->tester->resetCurrentDiscounts();
    }

    /**
     * @return void
     */
    public function testCalculatorStackWithGrossPriceMode(): void
    {
        $calculationFacade = $this->tester->createCalculationFacade();

        $quoteTransfer = $this->createFixtureDataForCalculation();
        $quoteTransfer->setPriceMode(CalculationPriceMode::PRICE_MODE_GROSS);

        $recalculatedQuoteTransfer = $calculationFacade->recalculateQuote($quoteTransfer);

        $itemTransfer = $recalculatedQuoteTransfer->getItems()[0];

        $this->assertSame(19, $itemTransfer->getTaxRate());
        $this->assertSame(16, $itemTransfer->getUnitTaxAmount());
        $this->assertSame(32, $itemTransfer->getSumTaxAmount());
        $this->assertSame(20, $itemTransfer->getUnitTaxAmountFullAggregation());
        $this->assertSame(40, $itemTransfer->getSumTaxAmountFullAggregation());

        $this->assertSame(100, $itemTransfer->getUnitGrossPrice());
        $this->assertSame(200, $itemTransfer->getSumGrossPrice());

        $this->assertSame(100, $itemTransfer->getUnitPrice());
        $this->assertSame(200, $itemTransfer->getSumPrice());

        $this->assertSame(125, $itemTransfer->getUnitSubtotalAggregation());
        $this->assertSame(250, $itemTransfer->getSumSubtotalAggregation());

        $this->assertSame(125, $itemTransfer->getUnitPriceToPayAggregation());
        $this->assertSame(250, $itemTransfer->getSumPriceToPayAggregation());

        $this->assertSame(0, $itemTransfer->getUnitDiscountAmountAggregation());
        $this->assertSame(0, $itemTransfer->getSumDiscountAmountAggregation());

        $this->assertSame(0, $itemTransfer->getUnitDiscountAmountFullAggregation());
        $this->assertSame(0, $itemTransfer->getSumDiscountAmountFullAggregation());

        $expenseTransfer = $recalculatedQuoteTransfer->getExpenses()[0];

        $this->assertSame(100, $expenseTransfer->getUnitGrossPrice());
        $this->assertSame(100, $expenseTransfer->getSumGrossPrice());

        $this->assertSame(100, $expenseTransfer->getUnitPrice());
        $this->assertSame(100, $expenseTransfer->getSumPrice());

        $this->assertSame(100, $expenseTransfer->getUnitPriceToPayAggregation());
        $this->assertSame(100, $expenseTransfer->getSumPriceToPayAggregation());

        $this->assertSame(19, $expenseTransfer->getTaxRate());
        $this->assertSame(16, $expenseTransfer->getUnitTaxAmount());
        $this->assertSame(16, $expenseTransfer->getSumTaxAmount());

        $totalsTransfer = $recalculatedQuoteTransfer->getTotals();
        $this->assertSame(250, $totalsTransfer->getSubtotal());
        $this->assertSame(0, $totalsTransfer->getDiscountTotal());
        $this->assertSame(100, $totalsTransfer->getExpenseTotal());
        $this->assertSame(350, $totalsTransfer->getGrandTotal());
        $this->assertSame(56, $totalsTransfer->getTaxTotal()->getAmount());
    }

    /**
     * @return void
     */
    public function testCalculatorStackWithGrossPriceModeAfterDiscounts(): void
    {
        $calculationFacade = $this->tester->createCalculationFacade();

        $discountAmount = 20;
        $quoteTransfer = $this->createFixtureDataForCalculation();
        $quoteTransfer->setPriceMode(CalculationPriceMode::PRICE_MODE_GROSS);

        $voucherEntity = $this->tester->createDiscounts($discountAmount, DiscountDependencyProvider::PLUGIN_CALCULATOR_FIXED);

        $voucherDiscountTransfer = new DiscountTransfer();
        $voucherDiscountTransfer->setVoucherCode($voucherEntity->getCode());
        $quoteTransfer->addVoucherDiscount($voucherDiscountTransfer);

        $recalculatedQuoteTransfer = $calculationFacade->recalculateQuote($quoteTransfer);

        //item totals
        $itemTransfer = $recalculatedQuoteTransfer->getItems()[0];

        $this->assertSame(19, $itemTransfer->getTaxRate());
        $this->assertSame(14, $itemTransfer->getUnitTaxAmount());
        $this->assertSame(29, $itemTransfer->getSumTaxAmount());
        $this->assertSame(18, $itemTransfer->getUnitTaxAmountFullAggregation());
        $this->assertSame(37, $itemTransfer->getSumTaxAmountFullAggregation());

        $this->assertSame(100, $itemTransfer->getUnitGrossPrice());
        $this->assertSame(200, $itemTransfer->getSumGrossPrice());

        $this->assertSame(100, $itemTransfer->getUnitPrice());
        $this->assertSame(200, $itemTransfer->getSumPrice());

        $this->assertSame(125, $itemTransfer->getUnitSubtotalAggregation());
        $this->assertSame(250, $itemTransfer->getSumSubtotalAggregation());

        $this->assertSame(115, $itemTransfer->getUnitPriceToPayAggregation());
        $this->assertSame(230, $itemTransfer->getSumPriceToPayAggregation());

        $this->assertSame(10, $itemTransfer->getUnitDiscountAmountAggregation());
        $this->assertSame(20, $itemTransfer->getSumDiscountAmountAggregation());

        $this->assertSame(10, $itemTransfer->getUnitDiscountAmountFullAggregation());
        $this->assertSame(20, $itemTransfer->getSumDiscountAmountFullAggregation());

        //expenses
        $expenseTransfer = $quoteTransfer->getExpenses()[0];

        $this->assertSame(16, $expenseTransfer->getUnitTaxAmount());
        $this->assertSame(16, $expenseTransfer->getSumTaxAmount());

        $this->assertSame(100, $expenseTransfer->getUnitPriceToPayAggregation());
        $this->assertSame(100, $expenseTransfer->getSumPriceToPayAggregation());

        //order totals
        $totalsTransfer = $recalculatedQuoteTransfer->getTotals();

        $this->assertSame(250, $totalsTransfer->getSubtotal());
        $this->assertSame($discountAmount, $totalsTransfer->getDiscountTotal());
        $this->assertSame(100, $totalsTransfer->getExpenseTotal());
        $this->assertSame(330, $totalsTransfer->getGrandTotal());
        $this->assertSame(53, $totalsTransfer->getTaxTotal()->getAmount());
    }

    /**
     * @return void
     */
    public function testCalculatorStackWithNetTaxMode(): void
    {
        $calculationFacade = $this->tester->createCalculationFacade();
        $quoteTransfer = $this->createFixtureDataForCalculation();

        $quoteTransfer->setPriceMode(CalculationPriceMode::PRICE_MODE_NET);

        $discountAmount = 20;
        $voucherEntity = $this->tester->createDiscounts($discountAmount, DiscountDependencyProvider::PLUGIN_CALCULATOR_FIXED);

        $voucherDiscountTransfer = new DiscountTransfer();
        $voucherDiscountTransfer->setVoucherCode($voucherEntity->getCode());
        $quoteTransfer->addVoucherDiscount($voucherDiscountTransfer);

        $recalculatedQuoteTransfer = $calculationFacade->recalculateQuote($quoteTransfer);

        $itemTransfer = $recalculatedQuoteTransfer->getItems()[0];

        $this->assertSame(19, $itemTransfer->getTaxRate());
        $this->assertSame(13, $itemTransfer->getUnitTaxAmount());
        $this->assertSame(27, $itemTransfer->getSumTaxAmount());
        $this->assertSame(17, $itemTransfer->getUnitTaxAmountFullAggregation());
        $this->assertSame(34, $itemTransfer->getSumTaxAmountFullAggregation());

        $this->assertSame(80, $itemTransfer->getUnitNetPrice());
        $this->assertSame(160, $itemTransfer->getSumNetPrice());

        $this->assertSame(80, $itemTransfer->getUnitPrice());
        $this->assertSame(160, $itemTransfer->getSumPrice());

        $this->assertSame(100, $itemTransfer->getUnitSubtotalAggregation());
        $this->assertSame(200, $itemTransfer->getSumSubtotalAggregation());

        $this->assertSame(107, $itemTransfer->getUnitPriceToPayAggregation());
        $this->assertSame(214, $itemTransfer->getSumPriceToPayAggregation());

        $this->assertSame(10, $itemTransfer->getUnitDiscountAmountAggregation());
        $this->assertSame(20, $itemTransfer->getSumDiscountAmountAggregation());

        $this->assertSame(10, $itemTransfer->getUnitDiscountAmountFullAggregation());
        $this->assertSame(20, $itemTransfer->getSumDiscountAmountFullAggregation());

        $expenseTransfer = $recalculatedQuoteTransfer->getExpenses()[0];

        $this->assertSame(80, $expenseTransfer->getUnitNetPrice());
        $this->assertSame(80, $expenseTransfer->getSumNetPrice());

        $this->assertSame(80, $expenseTransfer->getUnitPrice());
        $this->assertSame(80, $expenseTransfer->getSumPrice());

        $this->assertSame(95, $expenseTransfer->getUnitPriceToPayAggregation());
        $this->assertSame(95, $expenseTransfer->getSumPriceToPayAggregation());

        $this->assertSame(19, $expenseTransfer->getTaxRate());
        $this->assertSame(15, $expenseTransfer->getUnitTaxAmount());
        $this->assertSame(15, $expenseTransfer->getSumTaxAmount());

        $totalsTransfer = $recalculatedQuoteTransfer->getTotals();
        $this->assertSame(200, $totalsTransfer->getSubtotal());
        $this->assertSame(20, $totalsTransfer->getDiscountTotal());
        $this->assertSame(80, $totalsTransfer->getExpenseTotal());
        $this->assertSame(309, $totalsTransfer->getGrandTotal());
        $this->assertSame(49, $totalsTransfer->getTaxTotal()->getAmount());
    }

    /**
     * @return void
     */
    public function testCalculatorStackWithNetTaxModeAfterDiscounts(): void
    {
        $calculationFacade = $this->tester->createCalculationFacade();
        $quoteTransfer = $this->createFixtureDataForCalculation();

        $quoteTransfer->setPriceMode(CalculationPriceMode::PRICE_MODE_NET);

        $recalculatedQuoteTransfer = $calculationFacade->recalculateQuote($quoteTransfer);

        $itemTransfer = $recalculatedQuoteTransfer->getItems()[0];

        $this->assertSame(19, $itemTransfer->getTaxRate());
        $this->assertSame(15, $itemTransfer->getUnitTaxAmount());
        $this->assertSame(30, $itemTransfer->getSumTaxAmount());
        $this->assertSame(19, $itemTransfer->getUnitTaxAmountFullAggregation());
        $this->assertSame(38, $itemTransfer->getSumTaxAmountFullAggregation());

        $this->assertSame(80, $itemTransfer->getUnitNetPrice());
        $this->assertSame(160, $itemTransfer->getSumNetPrice());

        $this->assertSame(80, $itemTransfer->getUnitPrice());
        $this->assertSame(160, $itemTransfer->getSumPrice());

        $this->assertSame(100, $itemTransfer->getUnitSubtotalAggregation());
        $this->assertSame(200, $itemTransfer->getSumSubtotalAggregation());

        $this->assertSame(119, $itemTransfer->getUnitPriceToPayAggregation());
        $this->assertSame(238, $itemTransfer->getSumPriceToPayAggregation());

        $this->assertSame(0, $itemTransfer->getUnitDiscountAmountAggregation());
        $this->assertSame(0, $itemTransfer->getSumDiscountAmountAggregation());

        $this->assertSame(0, $itemTransfer->getUnitDiscountAmountFullAggregation());
        $this->assertSame(0, $itemTransfer->getSumDiscountAmountFullAggregation());

        $expenseTransfer = $recalculatedQuoteTransfer->getExpenses()[0];

        $this->assertSame(80, $expenseTransfer->getUnitNetPrice());
        $this->assertSame(80, $expenseTransfer->getSumNetPrice());

        $this->assertSame(80, $expenseTransfer->getUnitPrice());
        $this->assertSame(80, $expenseTransfer->getSumPrice());

        $this->assertSame(95, $expenseTransfer->getUnitPriceToPayAggregation());
        $this->assertSame(95, $expenseTransfer->getSumPriceToPayAggregation());

        $this->assertSame(19, $expenseTransfer->getTaxRate());
        $this->assertSame(15, $expenseTransfer->getUnitTaxAmount());
        $this->assertSame(15, $expenseTransfer->getSumTaxAmount());

        $totalsTransfer = $recalculatedQuoteTransfer->getTotals();
        $this->assertSame(200, $totalsTransfer->getSubtotal());
        $this->assertSame(0, $totalsTransfer->getDiscountTotal());
        $this->assertSame(80, $totalsTransfer->getExpenseTotal());
        $this->assertSame(333, $totalsTransfer->getGrandTotal());
        $this->assertSame(53, $totalsTransfer->getTaxTotal()->getAmount());
    }

    /**
     * @return void
     */
    public function testTaxCalculationWhenDifferentRatesUsed(): void
    {
        $calculationFacade = $this->tester->createCalculationFacade();

        $quoteTransfer = $this->createFixtureDataForCalculation();

        $quoteTransfer->setExpenses(new ArrayObject());

        $abstractProductEntity = $this->tester->createAbstractProductWithTaxSet(7);

        $itemTransfer = $quoteTransfer->getItems()[0];
        $itemTransfer->setQuantity(1);
        $itemTransfer->setIdProductAbstract($abstractProductEntity->getIdProductAbstract());

        $productOptionTransferOriginal = $itemTransfer->getProductOptions()[0];
        $itemTransfer->setProductOptions(new ArrayObject());
        $productOptionTransfer = clone $productOptionTransferOriginal;
        $productOptionTransfer->setUnitGrossPrice(200);
        $productOptionTransfer->setQuantity(1);
        $itemTransfer->addProductOption($productOptionTransfer);

        $productOptionTransfer = clone $productOptionTransferOriginal;
        $productOptionTransfer->setUnitGrossPrice(50);
        $productOptionTransfer->setQuantity(1);
        $itemTransfer->addProductOption($productOptionTransfer);

        $recalculatedQuoteTransfer = $calculationFacade->recalculateQuote($quoteTransfer);

        //order totals
        $totalsTransfer = $recalculatedQuoteTransfer->getTotals();

        $recalculatedItemTransfer = $recalculatedQuoteTransfer->getItems()[0];

        $this->assertSame(7.0, $recalculatedItemTransfer->getTaxRate());
        $this->assertSame(7, $recalculatedItemTransfer->getUnitTaxAmount());
        $this->assertSame(7, $recalculatedItemTransfer->getSumTaxAmount());
        $this->assertSame(47, $recalculatedItemTransfer->getUnitTaxAmountFullAggregation());
        $this->assertSame(47, $recalculatedItemTransfer->getSumTaxAmountFullAggregation());

        $this->assertSame(47, $totalsTransfer->getTaxTotal()->getAmount());
    }

    /**
     * @return void
     */
    public function testTaxCalculationWhenDifferentRatesAndDiscountUsed(): void
    {
        $calculationFacade = $this->tester->createCalculationFacade();

        $quoteTransfer = $this->createFixtureDataForCalculation();

        $abstractProductEntity = $this->tester->createAbstractProductWithTaxSet(7);

        $quoteTransfer->setExpenses(new ArrayObject());

        $itemTransfer = $quoteTransfer->getItems()[0];
        $itemTransfer->setIdProductAbstract($abstractProductEntity->getIdProductAbstract());
        $itemTransfer->setQuantity(1);

        $productOptionTransferOriginal = $itemTransfer->getProductOptions()[0];
        $itemTransfer->setProductOptions(new ArrayObject());
        $productOptionTransfer = clone $productOptionTransferOriginal;
        $productOptionTransfer->setUnitGrossPrice(200);
        $productOptionTransfer->setQuantity(1);
        $itemTransfer->addProductOption($productOptionTransfer);

        $productOptionTransfer = clone $productOptionTransferOriginal;
        $productOptionTransfer->setUnitGrossPrice(50);
        $productOptionTransfer->setQuantity(1);
        $itemTransfer->addProductOption($productOptionTransfer);

        $voucherEntity = $this->tester->createDiscounts(20, DiscountDependencyProvider::PLUGIN_CALCULATOR_FIXED);

        $voucherDiscountTransfer = new DiscountTransfer();
        $voucherDiscountTransfer->setVoucherCode($voucherEntity->getCode());
        $quoteTransfer->addVoucherDiscount($voucherDiscountTransfer);

        $recalculatedQuoteTransfer = $calculationFacade->recalculateQuote($quoteTransfer);

        //order totals
        $totalsTransfer = $recalculatedQuoteTransfer->getTotals();
        $recalculatedItemTransfer = $recalculatedQuoteTransfer->getItems()[0];

        $this->assertSame(7.0, $recalculatedItemTransfer->getTaxRate());
        $this->assertSame(5, $recalculatedItemTransfer->getUnitTaxAmount());
        $this->assertSame(5, $recalculatedItemTransfer->getSumTaxAmount());
        $this->assertSame(45, $recalculatedItemTransfer->getUnitTaxAmountFullAggregation());
        $this->assertSame(45, $recalculatedItemTransfer->getSumTaxAmountFullAggregation());

        $this->assertSame(45, $totalsTransfer->getTaxTotal()->getAmount());
    }

    /**
     * @return void
     */
    public function testCalculationWhenTaxExemptionIsUsedShouldUseEmptyTax(): void
    {
        $calculationFacade = $this->tester->createCalculationFacade();

        $quoteTransfer = $this->createFixtureDataForCalculation();

        $abstractProductEntity = $this->tester->createAbstractProductWithTaxExemption();

        $quoteTransfer->setExpenses(new ArrayObject());

        $itemTransfer = $quoteTransfer->getItems()[0];
        $itemTransfer->setIdProductAbstract($abstractProductEntity->getIdProductAbstract());
        $itemTransfer->setQuantity(1);
        $itemTransfer->setProductOptions(new ArrayObject());

        $recalculatedQuoteTransfer = $calculationFacade->recalculateQuote($quoteTransfer);

        //order totals
        $totalsTransfer = $recalculatedQuoteTransfer->getTotals();

        $recalculatedItemTransfer = $recalculatedQuoteTransfer->getItems()[0];
        $this->assertSame(0.0, $recalculatedItemTransfer->getTaxRate());
        $this->assertSame(0, $recalculatedItemTransfer->getUnitTaxAmount());
        $this->assertSame(0, $recalculatedItemTransfer->getSumTaxAmount());

        $this->assertSame(0, $totalsTransfer->getTaxTotal()->getAmount());
    }

    /**
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    protected function createFixtureDataForCalculation(): QuoteTransfer
    {
        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setStore($this->tester->getCurrentStoreTransfer());

        $currencyTransfer = new CurrencyTransfer();
        $currencyTransfer->setCode('EUR');
        $quoteTransfer->setCurrency($currencyTransfer);

        $quoteTransfer->setPriceMode(CalculationPriceMode::PRICE_MODE_GROSS);

        $shippingAddressTransfer = new AddressTransfer();
        $shippingAddressTransfer->setIso2Code('DE');
        $quoteTransfer->setShippingAddress($shippingAddressTransfer);

        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku('test1');
        $itemTransfer->setTaxRate(19);
        $itemTransfer->setQuantity(2);
        $itemTransfer->setUnitGrossPrice(100);
        $itemTransfer->setUnitNetPrice(80);

        $productOptionTransfer = new ProductOptionTransfer();
        $productOptionTransfer->setTaxRate(19);
        $productOptionTransfer->setQuantity(2);
        $productOptionTransfer->setUnitGrossPrice(25);
        $productOptionTransfer->setUnitNetPrice(20);

        $itemTransfer->addProductOption($productOptionTransfer);

        $quoteTransfer->addItem($itemTransfer);

        $expenseTransfer = new ExpenseTransfer();
        $expenseTransfer->setUnitGrossPrice(100);
        $expenseTransfer->setUnitNetPrice(80);
        $expenseTransfer->setTaxRate(19);
        $expenseTransfer->setQuantity(1);
        $quoteTransfer->addExpense($expenseTransfer);

        return $quoteTransfer;
    }

    /**
     * @return array
     */
    public function getTaxInitTestData(): array
    {
        return [
            'Gross - Test case 1' => [
                CalculationPriceMode::PRICE_MODE_GROSS,
                [
                    [10000, 2, 19, [[2500, 2, 10], [1000, 2, 15]], [], 0],
                    [33234, 1, 9.99, [[1012, 1, 4.21], [9954, 1, 0.98]], [], 0],
                ],
                [],
                [71200, 0, 0, 71200, 7065, 71200],
            ],
            'Gross - Test case 2' => [
                CalculationPriceMode::PRICE_MODE_GROSS,
                [
                    [100, 1, 19, [[50, 1, 10], [10, 1, 15]], [80], 0],
                    [1000, 1, 9.99, [[100, 1, 4.21], [100, 1, 0.98]], [500], 0],
                ],
                [],
                [1360, 0, 580, 780, 60, 780],
            ],
            'Gross - Test case 3' => [
                CalculationPriceMode::PRICE_MODE_GROSS,
                [
                    [10000, 3, 19, [[2500, 3, 10], [1000, 3, 15]], [], 0],
                    [33234, 2, 9.99, [[1012, 2, 4.21], [9954, 2, 0.98]], [], 0],
                ],
                [100000, 1, 20],
                [128900, 100000, 0, 228900, 28842, 228900],
            ],
            'Gross - Test case 4' => [
                CalculationPriceMode::PRICE_MODE_GROSS,
                [
                    [10000, 89, 19, [[2500, 89, 10], [1000, 89, 15]], [120932], 0],
                    [33234, 43, 9.99, [[1012, 43, 4.21], [9954, 43, 0.98]], [876543], 0],
                ],
                [100000, 1, 20],
                [3102100, 100000, 997475, 2204625, 227390, 2204625],
            ],

            'Net - Test case 1' => [
                CalculationPriceMode::PRICE_MODE_NET,
                [
                    [10000, 49, 19, [[2500, 49, 10], [1000, 49, 15]], [], 0],
                    [33234, 99, 9.99, [[1012, 99, 4.21], [9954, 99, 0.98]], [], 0],
                ],
                [],
                [5037300, 0, 0, 5492563, 455263, 5492563],
            ],
            'Net - Test case 2' => [
                CalculationPriceMode::PRICE_MODE_NET,
                [
                    [10000, 1, 19, [[2500, 1, 10], [1000, 1, 15]], [3200, 2100], 0],
                    [33234, 1, 9.99, [[1012, 1, 4.21], [9954, 1, 0.98]], [10276, 111], 0],
                ],
                [],
                [57700, 0, 15687, 45728, 3715, 45728],
            ],
            'Net - Test case 3' => [
                CalculationPriceMode::PRICE_MODE_NET,
                [
                    [10000, 2, 19, [[2500, 2, 10], [1000, 2, 15]], [], 0],
                    [33234, 12, 9.99, [[1012, 12, 4.21], [9954, 12, 0.98]], [], 0],
                ],
                [12089, 1, 5.55],
                [557400, 12089, 0, 616283, 46794, 616283],
            ],
            'Net - Test case 4' => [
                CalculationPriceMode::PRICE_MODE_NET,
                [
                    [10000, 87, 19, [[2500, 87, 10], [1000, 87, 15]], [120932], 40000],
                    [33234, 13, 9.99, [[1012, 13, 4.21], [9954, 13, 0.98]], [276543], 66468],
                ],
                [100000, 1, 5.55],
                [1749100, 100000, 397475, 1545186, 200029, 1545186],
            ],
        ];
    }

    /**
     * @dataProvider getTaxInitTestData
     *
     * @param string $priceMode
     * @param array $items
     * @param array $expense
     * @param array $results
     *
     * @return void
     */
    public function testCalculationTotalQuoteValues($priceMode, $items, $expense, $results): void
    {
        $calculationFacade = $this->tester->createCalculationFacade();
        $quoteTransfer = $this->createFixtureDataForTestCases($priceMode, $items, $expense);

        $quoteTransfer = $calculationFacade->recalculateQuote($quoteTransfer);
        $quoteTransfer = $this->tester->recalculateCanceledAmount($items, $quoteTransfer);

        $this->assertSame($results[0], $quoteTransfer->getTotals()->getSubtotal());
        $this->assertSame($results[1], $quoteTransfer->getTotals()->getExpenseTotal());
        $this->assertSame($results[2], $quoteTransfer->getTotals()->getDiscountTotal());
        $this->assertSame($results[3], $quoteTransfer->getTotals()->getGrandTotal());
        $this->assertSame($results[4], $quoteTransfer->getTotals()->getTaxTotal()->getAmount());
        $this->assertSame($results[5], $quoteTransfer->getTotals()->getRefundTotal());
    }

    /**
     * @param string $priceMode
     * @param array $items
     * @param array $expense
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    protected function createFixtureDataForTestCases($priceMode, $items, $expense): QuoteTransfer
    {
        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setStore($this->tester->getCurrentStoreTransfer());
        $quoteTransfer->setCurrency($this->tester->createCurrencyTransfer());
        $quoteTransfer->setPriceMode($priceMode);

        foreach ($items as $item) {
            $itemTransfer = $this->tester->createItemTransfer($item[0], $priceMode, $item[2], $item[1]);

            foreach ($item[3] as $productOption) {
                $itemTransfer->addProductOption($this->tester->createProductOptionTransfer($productOption[0], $priceMode, $productOption[2], $productOption[1]));
            }

            foreach ($item[4] as $discountAmount) {
                $quoteTransfer->addVoucherDiscount($this->tester->createDiscountTransfer($discountAmount, $itemTransfer->getSku()));
            }

            $quoteTransfer->addItem($itemTransfer);
        }

        if (!empty($expense)) {
            $quoteTransfer->addExpense($this->tester->createExpenseTransfer($expense[0], $priceMode, $expense[2], $expense[1]));
        }

        return $quoteTransfer;
    }
}
