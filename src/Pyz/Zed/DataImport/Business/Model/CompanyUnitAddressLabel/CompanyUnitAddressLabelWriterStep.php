<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\CompanyUnitAddressLabel;

use Orm\Zed\CompanyUnitAddress\Persistence\SpyCompanyUnitAddressQuery;
use Orm\Zed\CompanyUnitAddressLabel\Persistence\SpyCompanyUnitAddressLabel;
use Orm\Zed\CompanyUnitAddressLabel\Persistence\SpyCompanyUnitAddressLabelQuery;
use Orm\Zed\CompanyUnitAddressLabel\Persistence\SpyCompanyUnitAddressLabelToCompanyUnitAddressQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class CompanyUnitAddressLabelWriterStep implements DataImportStepInterface
{
    const KEY_NAME = 'name';
    const KEY_COMPANY_UNIT_ADDRESS_ADDRESS_1 = 'company_unit_address_address1';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $labelEntity = SpyCompanyUnitAddressLabelQuery::create()
            ->filterByName($dataSet[static::KEY_NAME])
            ->findOneOrCreate();

        $labelEntity->save();

        if (!empty($dataSet[static::KEY_COMPANY_UNIT_ADDRESS_ADDRESS_1])) {
            $this->createRelation($dataSet, $labelEntity);
        }
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     * @param \Orm\Zed\CompanyUnitAddressLabel\Persistence\SpyCompanyUnitAddressLabel $companyUnitAddressLabelEntity
     *
     * @return void
     */
    protected function createRelation(DataSetInterface $dataSet, SpyCompanyUnitAddressLabel $companyUnitAddressLabelEntity)
    {
        $companyUnitAddressEntity = SpyCompanyUnitAddressQuery::create()
            ->filterByAddress1($dataSet[static::KEY_COMPANY_UNIT_ADDRESS_ADDRESS_1])
            ->findOne();

        $companyUnitAddressLabelEntity = SpyCompanyUnitAddressLabelToCompanyUnitAddressQuery::create()
            ->filterByFkCompanyUnitAddress($companyUnitAddressEntity->getIdCompanyUnitAddress())
            ->filterByFkCompanyUnitAddressLabel($companyUnitAddressLabelEntity->getIdCompanyUnitAddressLabel())
            ->findOneOrCreate();

        $companyUnitAddressLabelEntity->save();
    }
}
