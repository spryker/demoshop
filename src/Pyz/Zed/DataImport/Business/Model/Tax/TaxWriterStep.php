<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Tax;

use Orm\Zed\Tax\Persistence\SpyTaxRateQuery;
use Orm\Zed\Tax\Persistence\SpyTaxSetQuery;
use Orm\Zed\Tax\Persistence\SpyTaxSetTaxQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class TaxWriterStep implements DataImportStepInterface
{

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $query = new SpyTaxRateQuery();
        $taxRateEntity = $query
            ->filterByFkCountry($dataSet['idCountry'])
            ->filterByName($dataSet['tax_rate_name'])
            ->findOneOrCreate();

        $taxRateEntity->setRate($dataSet['tax_rate_percent']);
        $taxRateEntity->save();

        $query = new SpyTaxSetQuery();
        $taxSetEntity = $query
            ->filterByName($dataSet['tax_set_name'])
            ->findOneOrCreate();

        $taxSetEntity->save();

        $query = new SpyTaxSetTaxQuery();
        $taxSetTaxEntity = $query
            ->filterByFkTaxRate($taxRateEntity->getIdTaxRate())
            ->filterByFkTaxSet($taxSetEntity->getIdTaxSet())
            ->findOneOrCreate();

        $taxSetTaxEntity->save();
    }

}
