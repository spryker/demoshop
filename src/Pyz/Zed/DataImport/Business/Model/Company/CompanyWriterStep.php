<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Company;

use Orm\Zed\Company\Persistence\SpyCompanyQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class CompanyWriterStep implements DataImportStepInterface
{
    const KEY_NAME = 'name';
    const KEY_IS_ACTIVE = 'is_active';
    const KEY_STATUS = 'status';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $currencyEntity = SpyCompanyQuery::create()
            ->filterByName($dataSet[static::KEY_NAME])
            ->findOneOrCreate();

        $currencyEntity->setIsActive($dataSet[static::KEY_IS_ACTIVE]);
        $currencyEntity->setStatus($dataSet[static::KEY_STATUS]);

        $currencyEntity->save();
    }
}
