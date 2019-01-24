<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Zed\Calculation;

use Codeception\Actor;
use DateTime;
use Generated\Shared\Transfer\CurrencyTransfer;
use Generated\Shared\Transfer\DiscountTransfer;
use Generated\Shared\Transfer\ExpenseTransfer;
use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\ProductOptionTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\StoreTransfer;
use Orm\Zed\Country\Persistence\SpyCountryQuery;
use Orm\Zed\Currency\Persistence\SpyCurrency;
use Orm\Zed\Currency\Persistence\SpyCurrencyQuery;
use Orm\Zed\Discount\Persistence\SpyDiscount;
use Orm\Zed\Discount\Persistence\SpyDiscountAmount;
use Orm\Zed\Discount\Persistence\SpyDiscountQuery;
use Orm\Zed\Discount\Persistence\SpyDiscountStore;
use Orm\Zed\Discount\Persistence\SpyDiscountVoucher;
use Orm\Zed\Discount\Persistence\SpyDiscountVoucherPool;
use Orm\Zed\Product\Persistence\SpyProductAbstract;
use Orm\Zed\ProductOption\Persistence\SpyProductOptionGroup;
use Orm\Zed\ProductOption\Persistence\SpyProductOptionValue;
use Orm\Zed\Tax\Persistence\SpyTaxRate;
use Orm\Zed\Tax\Persistence\SpyTaxSet;
use Orm\Zed\Tax\Persistence\SpyTaxSetTax;
use Pyz\Zed\Calculation\CalculationDependencyProvider;
use Pyz\Zed\Discount\DiscountDependencyProvider;
use Spryker\Shared\Calculation\CalculationPriceMode;
use Spryker\Shared\Tax\TaxConstants;
use Spryker\Zed\Calculation\Business\CalculationBusinessFactory;
use Spryker\Zed\Calculation\Business\CalculationFacade;
use Spryker\Zed\Calculation\Communication\Plugin\Calculator\GrandTotalCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\Calculator\RefundableAmountCalculatorPlugin;
use Spryker\Zed\Calculation\Communication\Plugin\Calculator\RefundTotalCalculatorPlugin;
use Spryker\Zed\Kernel\Container;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
 */
class CalculationBusinessTester extends Actor
{
    use _generated\CalculationBusinessTesterActions;

    /**
     * @var int
     */
    protected $incrementNumber = 0;

    /**
     * @param int $discountAmount
     * @param string $calculatorType
     * @param string $sku
     *
     * @return \Orm\Zed\Discount\Persistence\SpyDiscountVoucher
     */
    public function createDiscounts(int $discountAmount, string $calculatorType, string $sku = '*'): SpyDiscountVoucher
    {
        $discountVoucherPoolEntity = new SpyDiscountVoucherPool();
        $discountVoucherPoolEntity->setName('test-pool' . $this->getIncrementNumber());
        $discountVoucherPoolEntity->setIsActive(true);
        $discountVoucherPoolEntity->save();

        $discountVoucherEntity = new SpyDiscountVoucher();
        $discountVoucherEntity->setCode('spryker-test' . $this->getIncrementNumber());
        $discountVoucherEntity->setIsActive(true);
        $discountVoucherEntity->setFkDiscountVoucherPool($discountVoucherPoolEntity->getIdDiscountVoucherPool());
        $discountVoucherEntity->save();

        $discountEntity = new SpyDiscount();
        $discountEntity->setAmount($discountAmount);
        $discountEntity->setDisplayName('test1' . $this->getIncrementNumber());
        $discountEntity->setIsActive(1);
        $discountEntity->setValidFrom(new DateTime('1985-07-01'));
        $discountEntity->setValidTo(new DateTime('2050-07-01'));
        $discountEntity->setCalculatorPlugin($calculatorType);
        $discountEntity->setCollectorQueryString('sku = "' . $sku . '"');

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
     * @param int $price
     * @param string $priceMode
     * @param float $taxRate
     * @param int $quantity
     *
     * @return \Generated\Shared\Transfer\ExpenseTransfer
     */
    public function createExpenseTransfer(int $price, string $priceMode, float $taxRate, int $quantity): ExpenseTransfer
    {
        $expenseTransfer = new ExpenseTransfer();
        $expenseTransfer->setTaxRate($taxRate);
        $expenseTransfer->setQuantity($quantity);

        if ($priceMode === CalculationPriceMode::PRICE_MODE_GROSS) {
            $expenseTransfer->setUnitGrossPrice($price);
        }

        if ($priceMode === CalculationPriceMode::PRICE_MODE_NET) {
            $expenseTransfer->setUnitNetPrice($price);
        }

        return $expenseTransfer;
    }

    /**
     * @param array $calculatorPlugins
     *
     * @return \Spryker\Zed\Calculation\Business\CalculationFacade
     */
    public function createCalculationFacade(array $calculatorPlugins = []): CalculationFacade
    {
        if (empty($calculatorPlugins)) {
            return new CalculationFacade();
        }

        $calculationFacade = new CalculationFacade();

        $calculationBusinessFactory = new CalculationBusinessFactory();

        $container = new Container();
        $container[CalculationDependencyProvider::QUOTE_CALCULATOR_PLUGIN_STACK] = $calculatorPlugins;

        $calculationBusinessFactory->setContainer($container);
        $calculationFacade->setFactory($calculationBusinessFactory);

        return $calculationFacade;
    }

    /**
     * @return void
     */
    public function resetCurrentDiscounts(): void
    {
        $discounts = SpyDiscountQuery::create()->find();

        foreach ($discounts as $discountEntity) {
            $discountEntity->setIsActive(false);

            $discountEntity->save();
        }
    }

    /**
     * @param \Generated\Shared\Transfer\ItemTransfer[] $items
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function recalculateCanceledAmount(array $items, QuoteTransfer $quoteTransfer): QuoteTransfer
    {
        if (!$this->isCanceledAmount($items)) {
            return $quoteTransfer;
        }

        foreach ($quoteTransfer->getItems() as $itemTransferIndex => $itemTransfer) {
            $itemTransfer->setCanceledAmount($items[$itemTransferIndex][5]);
            $itemTransfer->setRefundableAmount($items[$itemTransferIndex][5]);
        }

        $calculationFacade = $this->createCalculationFacade(
            [
                new RefundableAmountCalculatorPlugin(),
                new RefundTotalCalculatorPlugin(),
                new GrandTotalCalculatorPlugin(),
            ]
        );

        return $calculationFacade->recalculateQuote($quoteTransfer);
    }

    /**
     * @param int $discountAmount
     * @param string $sku
     *
     * @return \Generated\Shared\Transfer\DiscountTransfer
     */
    public function createDiscountTransfer(int $discountAmount, string $sku): DiscountTransfer
    {
        $voucherEntity = $this->createDiscounts($discountAmount, DiscountDependencyProvider::PLUGIN_CALCULATOR_FIXED, $sku);

        return (new DiscountTransfer())
            ->setVoucherCode($voucherEntity->getCode());
    }

    /**
     * @return \Generated\Shared\Transfer\StoreTransfer
     */
    public function getCurrentStoreTransfer(): StoreTransfer
    {
        return (new StoreTransfer())
            ->setIdStore(1)
            ->setName('DE');
    }

    /**
     * @return \Generated\Shared\Transfer\CurrencyTransfer
     */
    public function createCurrencyTransfer(): CurrencyTransfer
    {
        return (new CurrencyTransfer())
            ->setCode('EUR');
    }

    /**
     * @param int $price
     * @param string $priceMode
     * @param float $taxRate
     * @param int $quantity
     *
     * @return \Generated\Shared\Transfer\ItemTransfer
     */
    public function createItemTransfer(int $price, string $priceMode, float $taxRate, int $quantity): ItemTransfer
    {
        $abstractProductEntity = $this->createAbstractProductWithTaxSet($taxRate);

        $itemTransfer = (new ItemTransfer())
            ->setName('test' . $this->getIncrementNumber())
            ->setIdProductAbstract($abstractProductEntity->getIdProductAbstract())
            ->setSku('test' . $this->getIncrementNumber())
            ->setQuantity($quantity)
            ->setTaxRate($taxRate);

        if ($priceMode === CalculationPriceMode::PRICE_MODE_GROSS) {
            $itemTransfer->setUnitGrossPrice($price);
        }

        if ($priceMode === CalculationPriceMode::PRICE_MODE_NET) {
            $itemTransfer->setUnitNetPrice($price);
        }

        return $itemTransfer;
    }

    /**
     * @param int $price
     * @param string $priceMode
     * @param float $taxRate
     * @param int $quantity
     *
     * @return \Generated\Shared\Transfer\ProductOptionTransfer
     */
    public function createProductOptionTransfer(int $price, string $priceMode, float $taxRate, int $quantity): ProductOptionTransfer
    {
        $productOptionValueEntity = $this->createProductOptionValue($taxRate);

        $productOptionTransfer = (new ProductOptionTransfer())
            ->setTaxRate($taxRate)
            ->setQuantity($quantity)
            ->setIdProductOptionValue($productOptionValueEntity->getIdProductOptionValue());

        if ($priceMode === CalculationPriceMode::PRICE_MODE_GROSS) {
            $productOptionTransfer->setUnitGrossPrice($price);
        }

        if ($priceMode === CalculationPriceMode::PRICE_MODE_NET) {
            $productOptionTransfer->setUnitNetPrice($price);
        }

        return $productOptionTransfer;
    }

    /**
     * @param float $taxRate
     *
     * @return \Orm\Zed\Product\Persistence\SpyProductAbstract
     */
    public function createAbstractProductWithTaxSet(float $taxRate): SpyProductAbstract
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
    public function createAbstractProductWithTaxExemption(): SpyProductAbstract
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
     * @return int
     */
    protected function getIncrementNumber(): int
    {
        return ++$this->incrementNumber;
    }

    /**
     * @return \Orm\Zed\Currency\Persistence\SpyCurrency
     */
    protected function getCurrency(): SpyCurrency
    {
        return SpyCurrencyQuery::create()->findOneByCode('EUR');
    }

    /**
     * @param float $taxRate
     *
     * @return \Orm\Zed\ProductOption\Persistence\SpyProductOptionValue
     */
    protected function createProductOptionValue(float $taxRate): SpyProductOptionValue
    {
        $countryEntity = SpyCountryQuery::create()->findOneByIso2Code('DE');

        $taxRateEntity = new SpyTaxRate();
        $taxRateEntity->setRate($taxRate);
        $taxRateEntity->setName('test rate');
        $taxRateEntity->setFkCountry($countryEntity->getIdCountry());
        $taxRateEntity->save();

        $taxSetEntity = $this->createTaxSet();
        $this->createTaxSetTax($taxSetEntity, $taxRateEntity);

        $productOptionGroupEntity = new SpyProductOptionGroup();
        $productOptionGroupEntity->setName('group.name.translation.key.edit');
        $productOptionGroupEntity->setFkTaxSet($taxSetEntity->getIdTaxSet());
        $productOptionGroupEntity->save();

        $productOptionValueEntity = new SpyProductOptionValue();
        $productOptionValueEntity->setSku('product-' . $this->getIncrementNumber());
        $productOptionValueEntity->setFkProductOptionGroup($productOptionGroupEntity->getIdProductOptionGroup());
        $productOptionValueEntity->setValue('product.option.test');
        $productOptionValueEntity->save();

        return $productOptionValueEntity;
    }

    /**
     * @return \Orm\Zed\Tax\Persistence\SpyTaxSet
     */
    protected function createTaxSet(): SpyTaxSet
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
    protected function createTaxSetTax(SpyTaxSet $taxSetEntity, SpyTaxRate $taxRateEntity): void
    {
        $taxSetTaxRateEntity = new SpyTaxSetTax();
        $taxSetTaxRateEntity->setFkTaxSet($taxSetEntity->getIdTaxSet());
        $taxSetTaxRateEntity->setFkTaxRate($taxRateEntity->getIdTaxRate());

        $taxSetTaxRateEntity->save();
    }

    /**
     * @param \Orm\Zed\Tax\Persistence\SpyTaxSet $taxSetEntity
     *
     * @return \Orm\Zed\Product\Persistence\SpyProductAbstract
     */
    protected function createAbstractProduct(SpyTaxSet $taxSetEntity): SpyProductAbstract
    {
        $abstractProductEntity = new SpyProductAbstract();
        $abstractProductEntity->setSku('test-abstract-sku_' . $this->getIncrementNumber());
        $abstractProductEntity->setAttributes('');
        $abstractProductEntity->setFkTaxSet($taxSetEntity->getIdTaxSet());
        $abstractProductEntity->save();

        return $abstractProductEntity;
    }

    /**
     * @param array $items
     *
     * @return bool
     */
    protected function isCanceledAmount(array $items): bool
    {
        foreach ($items as $item) {
            if ($item[5]) {
                return true;
            }
        }

        return false;
    }
}
