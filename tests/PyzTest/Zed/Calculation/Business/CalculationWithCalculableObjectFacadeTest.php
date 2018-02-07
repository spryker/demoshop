<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Zed\Calculation\Business;

use ArrayObject;
use Codeception\TestCase\Test;
use DateTime;
use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CurrencyTransfer;
use Generated\Shared\Transfer\DiscountTransfer;
use Generated\Shared\Transfer\ExpenseTransfer;
use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\ProductOptionTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\StoreTransfer;
use Orm\Zed\Country\Persistence\SpyCountryQuery;
use Orm\Zed\Currency\Persistence\SpyCurrencyQuery;
use Orm\Zed\Discount\Persistence\Base\SpyDiscountQuery;
use Orm\Zed\Discount\Persistence\SpyDiscount;
use Orm\Zed\Discount\Persistence\SpyDiscountAmount;
use Orm\Zed\Discount\Persistence\SpyDiscountStore;
use Orm\Zed\Discount\Persistence\SpyDiscountVoucher;
use Orm\Zed\Discount\Persistence\SpyDiscountVoucherPool;
use Orm\Zed\Product\Persistence\SpyProductAbstract;
use Orm\Zed\Tax\Persistence\SpyTaxRate;
use Orm\Zed\Tax\Persistence\SpyTaxSet;
use Orm\Zed\Tax\Persistence\SpyTaxSetTax;
use Spryker\Shared\Calculation\CalculationPriceMode;
use Spryker\Shared\Tax\TaxConstants;
use Spryker\Zed\Calculation\Business\CalculationFacade;
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
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();
        $this->resetCurrentDiscounts();
    }

    /**
     * @return void
     */
    public function testCalculatorStackWithGrossPriceMode()
    {
        $calculationFacade = $this->createCalculationFacade();

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
    public function testCalculatorStackWithGrossPriceModeAfterDiscounts()
    {
        $calculationFacade = $this->createCalculationFacade();

        $discountAmount = 20;
        $quoteTransfer = $this->createFixtureDataForCalculation();
        $quoteTransfer->setPriceMode(CalculationPriceMode::PRICE_MODE_GROSS);

        $voucherEntity = $this->createDiscounts($discountAmount, DiscountDependencyProvider::PLUGIN_CALCULATOR_FIXED);

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
    public function testCalculatorStackWithNetTaxMode()
    {
        $calculationFacade = $this->createCalculationFacade();
        $quoteTransfer = $this->createFixtureDataForCalculation();

        $quoteTransfer->setPriceMode(CalculationPriceMode::PRICE_MODE_NET);

        $discountAmount = 20;
        $voucherEntity = $this->createDiscounts($discountAmount, DiscountDependencyProvider::PLUGIN_CALCULATOR_FIXED);

        $voucherDiscountTransfer = new DiscountTransfer();
        $voucherDiscountTransfer->setVoucherCode($voucherEntity->getCode());
        $quoteTransfer->addVoucherDiscount($voucherDiscountTransfer);

        $recalculatedQuoteTransfer = $calculationFacade->recalculateQuote($quoteTransfer);

        $itemTransfer = $recalculatedQuoteTransfer->getItems()[0];

        $this->assertSame(19, $itemTransfer->getTaxRate());
        $this->assertSame(13, $itemTransfer->getUnitTaxAmount());
        $this->assertSame(27, $itemTransfer->getSumTaxAmount());
        $this->assertSame(17, $itemTransfer->getUnitTaxAmountFullAggregation());
        $this->assertSame(35, $itemTransfer->getSumTaxAmountFullAggregation());

        $this->assertSame(80, $itemTransfer->getUnitNetPrice());
        $this->assertSame(160, $itemTransfer->getSumNetPrice());

        $this->assertSame(80, $itemTransfer->getUnitPrice());
        $this->assertSame(160, $itemTransfer->getSumPrice());

        $this->assertSame(100, $itemTransfer->getUnitSubtotalAggregation());
        $this->assertSame(200, $itemTransfer->getSumSubtotalAggregation());

        $this->assertSame(107, $itemTransfer->getUnitPriceToPayAggregation());
        $this->assertSame(215, $itemTransfer->getSumPriceToPayAggregation());

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
        $this->assertSame(310, $totalsTransfer->getGrandTotal());
        $this->assertSame(50, $totalsTransfer->getTaxTotal()->getAmount());
    }

    /**
     * @return void
     */
    public function testCalculatorStackWithNetTaxModeAfterDiscounts()
    {
        $calculationFacade = $this->createCalculationFacade();
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
    public function testTaxCalculationWhenDifferentRatesUsed()
    {
        $calculationFacade = $this->createCalculationFacade();

        $quoteTransfer = $this->createFixtureDataForCalculation();

        $quoteTransfer->setExpenses(new ArrayObject());

        $abstractProductEntity = $this->createAbstractProductWithTaxSet(7);

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
    public function testTaxCalculationWhenDifferentRatesAndDiscountUsed()
    {
        $calculationFacade = $this->createCalculationFacade();

        $quoteTransfer = $this->createFixtureDataForCalculation();

        $abstractProductEntity = $this->createAbstractProductWithTaxSet(7);

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

        $voucherEntity = $this->createDiscounts(20, DiscountDependencyProvider::PLUGIN_CALCULATOR_FIXED);

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
    public function testCalculationWhenTaxExemptionIsUsedShouldUseEmptyTax()
    {
        $calculationFacade = $this->createCalculationFacade();

        $quoteTransfer = $this->createFixtureDataForCalculation();

        $abstractProductEntity = $this->createAbstractProductWithTaxExemption();

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
    protected function createFixtureDataForCalculation()
    {
        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setStore($this->getCurrentStoreTransfer());

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
     * @param int $discountAmount
     * @param string $calculatorType
     *
     * @return \Orm\Zed\Discount\Persistence\SpyDiscountVoucher
     */
    protected function createDiscounts($discountAmount, $calculatorType)
    {
        $discountVoucherPoolEntity = new SpyDiscountVoucherPool();
        $discountVoucherPoolEntity->setName('test-pool');
        $discountVoucherPoolEntity->setIsActive(true);
        $discountVoucherPoolEntity->save();

        $discountVoucherEntity = new SpyDiscountVoucher();
        $discountVoucherEntity->setCode('spryker-test');
        $discountVoucherEntity->setIsActive(true);
        $discountVoucherEntity->setFkDiscountVoucherPool($discountVoucherPoolEntity->getIdDiscountVoucherPool());
        $discountVoucherEntity->save();

        $discountEntity = new SpyDiscount();
        $discountEntity->setAmount($discountAmount);
        $discountEntity->setDisplayName('test1');
        $discountEntity->setIsActive(1);
        $discountEntity->setValidFrom(new DateTime('1985-07-01'));
        $discountEntity->setValidTo(new DateTime('2050-07-01'));
        $discountEntity->setCalculatorPlugin($calculatorType);
        $discountEntity->setCollectorQueryString('sku = "*"');
        $discountEntity->setFkDiscountVoucherPool($discountVoucherPoolEntity->getIdDiscountVoucherPool());
        $discountEntity->save();

        (new SpyDiscountStore())
            ->setFkDiscount($discountEntity->getIdDiscount())
            ->setFkStore($this->getCurrentStoreTransfer()->getIdStore())
            ->save();

        $discountAmountEntity = new SpyDiscountAmount();
        $currencyEntity = $this->getCurrency();
        $discountAmountEntity->setFkCurrency($currencyEntity->getIdCurrency());
        $discountAmountEntity->setNetAmount($discountAmount);
        $discountAmountEntity->setGrossAmount($discountAmount);
        $discountAmountEntity->setFkDiscount($discountEntity->getIdDiscount());
        $discountAmountEntity->save();

        $discountEntity->reload(true);
        $pool = $discountEntity->getVoucherPool();
        $pool->getDiscountVouchers();

        return $discountVoucherEntity;
    }

    /**
     * @return \Generated\Shared\Transfer\StoreTransfer
     */
    protected function getCurrentStoreTransfer()
    {
        return (new StoreTransfer())
            ->setIdStore(1)
            ->setName('DE');
    }

    /**
     * @return \Orm\Zed\Currency\Persistence\SpyCurrency
     */
    protected function getCurrency()
    {
        return SpyCurrencyQuery::create()->findOneByCode('EUR');
    }

    /**
     * @return \Spryker\Zed\Calculation\Business\CalculationFacade
     */
    protected function createCalculationFacade()
    {
        return new CalculationFacade();
    }

    /**
     * @return void
     */
    protected function resetCurrentDiscounts()
    {
        $discounts = SpyDiscountQuery::create()->find();
        foreach ($discounts as $discountEntity) {
            $discountEntity->setIsActive(false);
            $discountEntity->save();
        }
    }

    /**
     * @param int $taxRate
     *
     * @return \Orm\Zed\Product\Persistence\SpyProductAbstract
     */
    protected function createAbstractProductWithTaxSet($taxRate)
    {
        $countryEntity = SpyCountryQuery::create()->findOneByIso2Code('DE');

        $taxRateEntity = new SpyTaxRate();
        $taxRateEntity->setRate($taxRate);
        $taxRateEntity->setName('test rate');
        $taxRateEntity->setFkCountry($countryEntity->getIdCountry());
        $taxRateEntity->save();

        $taxSetEntity = $this->createTaxSet();

        $this->createTaxSetTax($taxSetEntity, $taxRateEntity);

        $abstractProductEntity = $this->createAbstractProduct($taxSetEntity);

        return $abstractProductEntity;
    }

    /**
     * @return \Orm\Zed\Product\Persistence\SpyProductAbstract
     */
    protected function createAbstractProductWithTaxExemption()
    {
        $taxRateEntity = new SpyTaxRate();
        $taxRateEntity->setRate(0);
        $taxRateEntity->setName(TaxConstants::TAX_EXEMPT_PLACEHOLDER);
        $taxRateEntity->save();

        $taxSetEntity = $this->createTaxSet();

        $this->createTaxSetTax($taxSetEntity, $taxRateEntity);

        $abstractProductEntity = $this->createAbstractProduct($taxSetEntity);

        return $abstractProductEntity;
    }

    /**
     * @param \Orm\Zed\Tax\Persistence\SpyTaxSet $taxSetEntity
     *
     * @return \Orm\Zed\Product\Persistence\SpyProductAbstract
     */
    protected function createAbstractProduct(SpyTaxSet $taxSetEntity)
    {
        $abstractProductEntity = new SpyProductAbstract();
        $abstractProductEntity->setSku('test-abstract-sku');
        $abstractProductEntity->setAttributes('');
        $abstractProductEntity->setFkTaxSet($taxSetEntity->getIdTaxSet());
        $abstractProductEntity->save();

        return $abstractProductEntity;
    }

    /**
     * @return \Orm\Zed\Tax\Persistence\SpyTaxSet
     */
    protected function createTaxSet()
    {
        $taxSetEntity = new SpyTaxSet();
        $taxSetEntity->setName('name of tax set');
        $taxSetEntity->save();
        return $taxSetEntity;
    }

    /**
     * @param \Orm\Zed\Tax\Persistence\SpyTaxSet $taxSetEntity
     * @param \Orm\Zed\Tax\Persistence\SpyTaxRate $taxRateEntity
     *
     * @return void
     */
    protected function createTaxSetTax(SpyTaxSet $taxSetEntity, SpyTaxRate $taxRateEntity)
    {
        $taxSetTaxRateEntity = new SpyTaxSetTax();
        $taxSetTaxRateEntity->setFkTaxSet($taxSetEntity->getIdTaxSet());
        $taxSetTaxRateEntity->setFkTaxRate($taxRateEntity->getIdTaxRate());
        $taxSetTaxRateEntity->save();
    }
}
