<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\DiscountAmount;

use Orm\Zed\Currency\Persistence\SpyCurrencyQuery;
use Orm\Zed\Discount\Persistence\SpyDiscountAmountQuery;
use Orm\Zed\Discount\Persistence\SpyDiscountQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class DiscountAmountWriterStep implements DataImportStepInterface
{
    const BULK_SIZE = 100;

    const KEY_DISCOUNT_KEY = 'discount_key';
    const KEY_CURRENCY = 'currency';
    const KEY_VALUE_NET = 'value_net';
    const KEY_VALUE_GROSS = 'value_gross';

    protected static $currencyCache = [];

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $discountEntity = SpyDiscountQuery::create()
            ->findOneByDiscountKey($dataSet[static::KEY_DISCOUNT_KEY]);

        if (!$discountEntity) {
            return;
        }

        $currencyEntity = $this->getCurrencyByCode($dataSet[static::KEY_CURRENCY]);

        $discountAmountEntity = SpyDiscountAmountQuery::create()
            ->filterByFkDiscount($discountEntity->getIdDiscount())
            ->filterByFkCurrency($currencyEntity->getIdCurrency())
            ->filterByGrossAmount($dataSet[static::KEY_VALUE_GROSS])
            ->filterByNetAmount($dataSet[static::KEY_VALUE_NET])
            ->findOneOrCreate();

        $discountAmountEntity->save();
    }

    /**
     * @param string $currencyCode
     *
     * @return \Orm\Zed\Currency\Persistence\SpyCurrency
     */
    protected function getCurrencyByCode($currencyCode)
    {
        if (isset(static::$currencyCache[$currencyCode])) {
            return static::$currencyCache[$currencyCode];
        }

        $currencyEntity = SpyCurrencyQuery::create()
            ->filterByCode($currencyCode)
            ->findOne();

        static::$currencyCache[$currencyCode] = $currencyEntity;

        return static::$currencyCache[$currencyCode];
    }
}
