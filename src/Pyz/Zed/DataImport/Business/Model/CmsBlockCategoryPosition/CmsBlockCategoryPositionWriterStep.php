<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\CmsBlockCategoryPosition;

use Orm\Zed\CmsBlockCategoryConnector\Persistence\SpyCmsBlockCategoryPositionQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class CmsBlockCategoryPositionWriterStep implements DataImportStepInterface
{

    const KEY_POSITION_NAME = 'cms_block_category_position_name';

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
