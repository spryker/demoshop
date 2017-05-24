<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Stock;

use Orm\Zed\Stock\Persistence\SpyStockProductQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class StockWriterStep implements DataImportStepInterface
{

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $query = SpyStockProductQuery::create();
        $stockProductEntity = $query
            ->filterByFkProduct($dataSet['idProduct'])
            ->filterByFkStock($dataSet['idStock'])
            ->findOneOrCreate();

        $stockProductEntity
            ->setQuantity($dataSet['quantity'])
            ->setIsNeverOutOfStock($dataSet['is_never_out_of_stock']);

        $stockProductEntity->save();
    }

}
