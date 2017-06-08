<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Price;

use Orm\Zed\Price\Persistence\SpyPriceTypeQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class PriceTypeWriterStep implements DataImportStepInterface
{

    const KEY_NAME = 'name';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $priceTypeEntity = SpyPriceTypeQuery::create()
            ->filterByName($dataSet[self::KEY_NAME])
            ->findOneOrCreate();

        $priceTypeEntity->save();
    }

}
