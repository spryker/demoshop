<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\CompanyBusinessUnit;

use Orm\Zed\Company\Persistence\SpyCompanyQuery;
use Orm\Zed\CompanyBusinessUnit\Persistence\SpyCompanyBusinessUnitQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class CompanyBusinessUnitWriterStep implements DataImportStepInterface
{
    const KEY_NAME = 'name';
    const KEY_EMAIL = 'email';
    const KEY_PHONE = 'phone';
    const KEY_EXTERNAL_URL = 'external_url';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $idCompany = SpyCompanyQuery::create()
            ->findOne()
            ->getIdCompany();
        $currencyEntity = SpyCompanyBusinessUnitQuery::create()
            ->filterByName($dataSet[static::KEY_NAME])
            ->filterByEmail($dataSet[static::KEY_EMAIL])
            ->filterByPhone($dataSet[static::KEY_PHONE])
            ->filterByExternalUrl($dataSet[static::KEY_EXTERNAL_URL])
            ->filterByFkCompany($idCompany)
            ->findOneOrCreate();

        $currencyEntity->save();
    }
}
