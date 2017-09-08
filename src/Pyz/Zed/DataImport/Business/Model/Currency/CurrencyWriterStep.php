<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Currency;

use Orm\Zed\Currency\Persistence\SpyCurrencyQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class CurrencyWriterStep implements DataImportStepInterface
{

    const KEY_ISO_CODE = 'iso_code';
    const KEY_NAME = 'name';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $currencyEntity = SpyCurrencyQuery::create()
            ->filterByIsoCode($dataSet[static::KEY_ISO_CODE])
            ->filterByName($dataSet[static::KEY_NAME])
            ->findOneOrCreate();

        $currencyEntity->save();
    }

}
