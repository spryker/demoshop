<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Functional\Pyz\Zed\Calculation;

use ArrayObject;
use Codeception\TestCase\Test;
use DateTime;
use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\DiscountTransfer;
use Generated\Shared\Transfer\ExpenseTransfer;
use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\ProductOptionTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Orm\Zed\Country\Persistence\SpyCountryQuery;
use Orm\Zed\Discount\Persistence\Base\SpyDiscountQuery;
use Orm\Zed\Discount\Persistence\SpyDiscount;
use Orm\Zed\Discount\Persistence\SpyDiscountVoucher;
use Orm\Zed\Discount\Persistence\SpyDiscountVoucherPool;
use Orm\Zed\Product\Persistence\SpyProductAbstract;
use Orm\Zed\Tax\Persistence\SpyTaxRate;
use Orm\Zed\Tax\Persistence\SpyTaxSet;
use Orm\Zed\Tax\Persistence\SpyTaxSetTax;
use Spryker\Shared\Tax\TaxConstants;
use Spryker\Zed\Calculation\Business\CalculationFacade;
use Spryker\Zed\Discount\DiscountDependencyProvider;

class CalculationFacadeTest extends Test
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
    public function testCalculatorStackWithoutDiscounts()
    {
        $calculationFacade = $this->createCalculationFacade();
        $quoteTransfer = $this->createFixtureDataForCalculation();

        $recalculatedQuoteTransfer = $calculationFacade->recalculate($quoteTransfer);

        $itemTransfer = $recalculatedQuoteTransfer->getItems()[0];

        $this->assertSame(19, $itemTransfer->getTaxRate());
        $this->assertSame(16, $itemTransfer->getUnitTaxAmount());
        $this->assertSame(32, $itemTransfer->getSumTaxAmount());
        $this->assertSame(20, $itemTransfer->getUnitTaxAmountWithProductOptionAndDiscountAmounts());
        $this->assertSame(40, $itemTransfer->getSumTaxAmountWithProductOptionAndDiscountAmounts());

        $this->assertSame(100, $itemTransfer->getUnitGrossPrice());
        $this->assertSame(200, $itemTransfer->getSumGrossPrice());

        $this->assertSame(100, $itemTransfer->getUnitGrossPriceWithDiscounts());
        $this->assertSame(200, $itemTransfer->getSumGrossPriceWithDiscounts());

        $this->assertSame(125, $itemTransfer->getUnitGrossPriceWithProductOptions());
        $this->assertSame(250, $itemTransfer->getSumGrossPriceWithProductOptions());

        $this->assertSame(125, $itemTransfer->getUnitGrossPriceWithProductOptionAndDiscountAmounts());
        $this->assertSame(250, $itemTransfer->getSumGrossPriceWithProductOptionAndDiscountAmounts());

        $this->assertSame(0, $itemTransfer->getUnitTotalDiscountAmount());
        $this->assertSame(0, $itemTransfer->getSumTotalDiscountAmount());

        $this->assertSame(0, $itemTransfer->getUnitTotalDiscountAmountWithProductOption());
        $this->assertSame(0, $itemTransfer->getSumTotalDiscountAmountWithProductOption());

        $expenseTransfer = $recalculatedQuoteTransfer->getExpenses()[0];

        $this->assertSame(100, $expenseTransfer->getUnitGrossPrice());
        $this->assertSame(100, $expenseTransfer->getSumGrossPrice());

        $this->assertSame(100, $expenseTransfer->getUnitGrossPriceWithDiscounts());
        $this->assertSame(100, $expenseTransfer->getSumGrossPriceWithDiscounts());

        $this->assertSame(19, $expenseTransfer->getTaxRate());
        $this->assertSame(16, $expenseTransfer->getUnitTaxAmount());
        $this->assertSame(16, $expenseTransfer->getSumTaxAmount());
        $this->assertSame(16, $expenseTransfer->getUnitTaxAmountWithDiscounts());
        $this->assertSame(16, $expenseTransfer->getSumTaxAmountWithDiscounts());

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
    public function testCalculatorStackWithDiscounts()
    {
        $calculationFacade = $this->createCalculationFacade();

        $discountAmount = 20;
        $quoteTransfer = $this->createFixtureDataForCalculation();
        $voucherEntity = $this->createDiscounts($discountAmount, DiscountDependencyProvider::PLUGIN_CALCULATOR_FIXED);

        $voucherDiscountTransfer = new DiscountTransfer();
        $voucherDiscountTransfer->setVoucherCode($voucherEntity->getCode());
        $quoteTransfer->addVoucherDiscount($voucherDiscountTransfer);

        $recalculatedQuoteTransfer = $calculationFacade->recalculate($quoteTransfer);

        //item totals
        $itemTransfer = $recalculatedQuoteTransfer->getItems()[0];

        $this->assertSame(19, $itemTransfer->getTaxRate());
        $this->assertSame(16, $itemTransfer->getUnitTaxAmount());
        $this->assertSame(32, $itemTransfer->getSumTaxAmount());
        $this->assertSame(18, $itemTransfer->getUnitTaxAmountWithProductOptionAndDiscountAmounts());
        $this->assertSame(37, $itemTransfer->getSumTaxAmountWithProductOptionAndDiscountAmounts());

        $this->assertSame(100, $itemTransfer->getUnitGrossPrice());
        $this->assertSame(200, $itemTransfer->getSumGrossPrice());

        $this->assertSame(90, $itemTransfer->getUnitGrossPriceWithDiscounts());
        $this->assertSame(180, $itemTransfer->getSumGrossPriceWithDiscounts());

        $this->assertSame(125, $itemTransfer->getUnitGrossPriceWithProductOptions());
        $this->assertSame(250, $itemTransfer->getSumGrossPriceWithProductOptions());

        $this->assertSame(115, $itemTransfer->getUnitGrossPriceWithProductOptionAndDiscountAmounts());
        $this->assertSame(230, $itemTransfer->getSumGrossPriceWithProductOptionAndDiscountAmounts());

        $this->assertSame(10, $itemTransfer->getUnitTotalDiscountAmount());
        $this->assertSame(20, $itemTransfer->getSumTotalDiscountAmount());

        $this->assertSame(10, $itemTransfer->getUnitTotalDiscountAmountWithProductOption());
        $this->assertSame(20, $itemTransfer->getSumTotalDiscountAmountWithProductOption());

        //expenses
        $expenseTransfer = $quoteTransfer->getExpenses()[0];

        $this->assertSame(16, $expenseTransfer->getUnitTaxAmount());
        $this->assertSame(16, $expenseTransfer->getSumTaxAmount());
        $this->assertSame(16, $expenseTransfer->getUnitTaxAmountWithDiscounts());
        $this->assertSame(16, $expenseTransfer->getSumTaxAmountWithDiscounts());

        $this->assertSame(100, $expenseTransfer->getSumGrossPriceWithDiscounts());
        $this->assertSame(0, $expenseTransfer->getSumTotalDiscountAmount());

        $this->assertSame(
            $discountAmount,
            (int)($expenseTransfer->getSumTotalDiscountAmount() + $itemTransfer->getSumTotalDiscountAmountWithProductOption())
        );

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

        $recalculatedQuoteTransfer = $calculationFacade->recalculate($quoteTransfer);

        //order totals
        $totalsTransfer = $recalculatedQuoteTransfer->getTotals();

        $this->assertSame(7.0, $itemTransfer->getTaxRate());
        $this->assertSame(7, $itemTransfer->getUnitTaxAmount());
        $this->assertSame(7, $itemTransfer->getSumTaxAmount());
        $this->assertSame(46, $itemTransfer->getUnitTaxAmountWithProductOptionAndDiscountAmounts());
        $this->assertSame(46, $itemTransfer->getSumTaxAmountWithProductOptionAndDiscountAmounts());

        $this->assertSame(46, $totalsTransfer->getTaxTotal()->getAmount());
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

        $recalculatedQuoteTransfer = $calculationFacade->recalculate($quoteTransfer);

        //order totals
        $totalsTransfer = $recalculatedQuoteTransfer->getTotals();

        $this->assertSame(7.0, $itemTransfer->getTaxRate());
        $this->assertSame(7, $itemTransfer->getUnitTaxAmount());
        $this->assertSame(7, $itemTransfer->getSumTaxAmount());
        $this->assertSame(45, $itemTransfer->getUnitTaxAmountWithProductOptionAndDiscountAmounts());
        $this->assertSame(45, $itemTransfer->getSumTaxAmountWithProductOptionAndDiscountAmounts());

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

        $recalculatedQuoteTransfer = $calculationFacade->recalculate($quoteTransfer);

        //order totals
        $totalsTransfer = $recalculatedQuoteTransfer->getTotals();

        $this->assertSame(0.0, $itemTransfer->getTaxRate());
        $this->assertSame(0, $itemTransfer->getUnitTaxAmount());
        $this->assertSame(0, $itemTransfer->getSumTaxAmount());

        $this->assertSame(0, $totalsTransfer->getTaxTotal()->getAmount());
    }

    /**
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    protected function createFixtureDataForCalculation()
    {
        $quoteTransfer = new QuoteTransfer();

        $shippingAddressTransfer = new AddressTransfer();
        $shippingAddressTransfer->setIso2Code('DE');
        $quoteTransfer->setShippingAddress($shippingAddressTransfer);

        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku('test1');
        $itemTransfer->setTaxRate(19);
        $itemTransfer->setQuantity(2);
        $itemTransfer->setUnitGrossPrice(100);

        $productOptionTransfer = new ProductOptionTransfer();
        $productOptionTransfer->setTaxRate(19);
        $productOptionTransfer->setQuantity(2);
        $productOptionTransfer->setUnitGrossPrice(25);

        $itemTransfer->addProductOption($productOptionTransfer);

        $quoteTransfer->addItem($itemTransfer);

        $expenseTransfer = new ExpenseTransfer();
        $expenseTransfer->setUnitGrossPrice(100);
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

        $discountEntity->reload(true);
        $pool = $discountEntity->getVoucherPool();
        $pool->getDiscountVouchers();

        return $discountVoucherEntity;
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
