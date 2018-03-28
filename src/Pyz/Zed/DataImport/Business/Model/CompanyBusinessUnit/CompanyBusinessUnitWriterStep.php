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
    const KEY_COMPANY_NAME = 'company_name';
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
        $company = SpyCompanyQuery::create()
            ->filterByName($dataSet[static::KEY_COMPANY_NAME])
            ->findOne();

        $companyBusinessUnit = SpyCompanyBusinessUnitQuery::create()
            ->filterByName($dataSet[static::KEY_NAME])
            ->findOneOrCreate();

        $companyBusinessUnit
            ->setEmail($dataSet[static::KEY_EMAIL])
            ->setPhone($dataSet[static::KEY_PHONE])
            ->setExternalUrl($dataSet[static::KEY_EXTERNAL_URL])
            ->setFkCompany($company->getIdCompany());

        $companyBusinessUnit->save();
    }
}
