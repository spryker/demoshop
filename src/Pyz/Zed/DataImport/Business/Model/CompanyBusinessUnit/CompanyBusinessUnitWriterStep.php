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
    public const KEY_NAME = 'name';
    public const KEY_COMPANY_NAME = 'company_name';
    public const KEY_EMAIL = 'email';
    public const KEY_PHONE = 'phone';
    public const KEY_EXTERNAL_URL = 'external_url';
    public const KEY_IBAN = 'iban';
    public const KEY_BIC = 'bic';

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
            ->setIban($dataSet[static::KEY_IBAN])
            ->setBic($dataSet[static::KEY_BIC])
            ->setFkCompany($company->getIdCompany());

        $companyBusinessUnit->save();
    }
}
