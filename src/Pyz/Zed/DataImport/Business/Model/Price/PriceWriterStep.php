<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Price;

use Orm\Zed\Price\Persistence\SpyPriceProductQuery;
use Spryker\Zed\DataImport\Business\Exception\DataKeyNotFoundInDataSetException;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class PriceWriterStep implements DataImportStepInterface
{

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @throws \Spryker\Zed\DataImport\Business\Exception\DataKeyNotFoundInDataSetException
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $query = SpyPriceProductQuery::create();
        $query->filterByFkPriceType($dataSet['idPriceType']);

        if (empty($dataSet['idAbstractProduct']) && empty($dataSet['idProduct'])) {
            throw new DataKeyNotFoundInDataSetException(sprintf(
                'One of "idProduct" or "idAbstractProduct" must be in the data set. Given: "%s"',
                implode(', ', array_keys($dataSet->getArrayCopy()))
            ));
        }

        if (!empty($dataSet['idAbstractProduct'])) {
            $query->filterByFkProductAbstract($dataSet['idAbstractProduct']);
        }
        if (!empty($dataSet['idProduct'])) {
            $query->filterByFkProduct($dataSet['idProduct']);
        }

        $productPrice = $query->findOneOrCreate();
        $productPrice->setPrice((int)$dataSet['price']);
        $productPrice->save();
    }

}
