<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\DataImport\Business\Model\Navigation;

use Orm\Zed\Navigation\Persistence\SpyNavigationQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class NavigationWriterStep implements DataImportStepInterface
{

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $query = SpyNavigationQuery::create();
        $navigationEntity = $query
            ->filterByKey($dataSet['key'])
            ->findOneOrCreate();

        $navigationEntity->setName($dataSet['name']);
        $navigationEntity->save();
    }


}
