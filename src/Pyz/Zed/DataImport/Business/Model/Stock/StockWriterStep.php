<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
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
