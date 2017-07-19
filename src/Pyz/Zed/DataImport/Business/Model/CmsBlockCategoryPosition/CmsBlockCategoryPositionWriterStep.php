<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\DataImport\Business\Model\CmsBlockCategoryPosition;

use Orm\Zed\CmsBlockCategoryConnector\Persistence\SpyCmsBlockCategoryPositionQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class CmsBlockCategoryPositionWriterStep implements DataImportStepInterface
{

    const KEY_POSITION_NAME = 'block_category_position_name';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $cmsBlockCategoryPositionEntity = SpyCmsBlockCategoryPositionQuery::create()
            ->filterByName($dataSet[static::KEY_POSITION_NAME])
            ->findOneOrCreate();

        if ($cmsBlockCategoryPositionEntity->isNew() || $cmsBlockCategoryPositionEntity->isModified()) {
            $cmsBlockCategoryPositionEntity->save();
        }
    }

}
