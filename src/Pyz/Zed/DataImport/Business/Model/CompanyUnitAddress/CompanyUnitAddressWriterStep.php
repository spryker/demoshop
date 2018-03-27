<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\CompanyUnitAddress;

use Orm\Zed\Company\Persistence\SpyCompanyQuery;
use Orm\Zed\CompanyUnitAddress\Persistence\SpyCompanyUnitAddressQuery;
use Orm\Zed\Country\Persistence\SpyCountryQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class CompanyUnitAddressWriterStep implements DataImportStepInterface
{
    const KEY_COUNTRY_CODE = 'country_code';
    const KEY_COMPANY_NAME = 'company_name';
    const KEY_ADDRESS1 = 'address1';
    const KEY_ADDRESS2 = 'address2';
    const KEY_ADDRESS3 = 'address3';
    const KEY_CITY = 'city';
    const KEY_ZIP_CODE = 'zip_code';
    const KEY_PHONE = 'phone';
    const KEY_COMMENT = 'comment';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $country = SpyCountryQuery::create()
            ->filterByIso2Code($dataSet[static::KEY_COUNTRY_CODE])
            ->findOne();

        $company = SpyCompanyQuery::create()
            ->filterByName($dataSet[static::KEY_COMPANY_NAME])
            ->findOne();

        $entity = SpyCompanyUnitAddressQuery::create()
            ->filterByFkCountry($country->getIdCountry())
            ->filterByFkCompany($company->getIdCompany())
            ->filterByAddress1($dataSet[static::KEY_ADDRESS1])
            ->filterByAddress2($dataSet[static::KEY_ADDRESS2])
            ->filterByAddress3($dataSet[static::KEY_ADDRESS3])
            ->filterByCity($dataSet[static::KEY_CITY])
            ->filterByZipCode($dataSet[static::KEY_ZIP_CODE])
            ->filterByPhone($dataSet[static::KEY_PHONE])
            ->findOneOrCreate();

        $entity
            ->setComment($dataSet[static::KEY_COMMENT]);

        $entity->save();
    }
}
