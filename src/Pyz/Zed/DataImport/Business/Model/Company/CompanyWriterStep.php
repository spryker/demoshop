<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Company;

use Orm\Zed\Company\Persistence\SpyCompanyQuery;
use Orm\Zed\Company\Persistence\SpyCompanyTypeQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class CompanyWriterStep implements DataImportStepInterface
{
    const KEY_NAME = 'name';
    const KEY_IS_ACTIVE = 'is_active';
    const KEY_STATUS = 'status';
    const KEY_COMPANY_TYPE = 'company_type';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $companyEntity = SpyCompanyQuery::create()
            ->filterByName($dataSet[static::KEY_NAME])
            ->findOneOrCreate();
        $companyTypeEntity = SpyCompanyTypeQuery::create()
            ->filterByName($dataSet[static::KEY_COMPANY_TYPE])
            ->findOne();

        $companyEntity->setIsActive($dataSet[static::KEY_IS_ACTIVE]);
        $companyEntity->setStatus($dataSet[static::KEY_STATUS]);
        $companyEntity->setFkCompanyType($companyTypeEntity->getIdCompanyType());

        $companyEntity->save();
    }
}
