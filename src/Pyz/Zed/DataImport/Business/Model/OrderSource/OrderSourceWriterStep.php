<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\OrderSource;

use DateTime;
use Orm\Zed\Sales\Persistence\SpyOrderSourceQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class OrderSourceWriterStep implements DataImportStepInterface
{
    const KEY_ORDER_SOURCE_NAME = 'order_source_name';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $orderSource = SpyOrderSourceQuery::create()
            ->filterByOrderSourceName($dataSet[static::KEY_ORDER_SOURCE_NAME])
            ->filterByCreatedAt(new DateTime())
            ->filterByUpdatedAt(new DateTime())
            ->findOneOrCreate();

        $orderSource->save();
    }
}
