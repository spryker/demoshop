<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\CmsBlockCategory;

use Orm\Zed\Category\Persistence\SpyCategoryQuery;
use Orm\Zed\Category\Persistence\SpyCategoryTemplateQuery;
use Orm\Zed\CmsBlock\Persistence\SpyCmsBlockQuery;
use Orm\Zed\CmsBlockCategoryConnector\Persistence\SpyCmsBlockCategoryConnectorQuery;
use Orm\Zed\CmsBlockCategoryConnector\Persistence\SpyCmsBlockCategoryPositionQuery;
use Spryker\Shared\CmsBlockCategoryConnector\CmsBlockCategoryConnectorConfig;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\TouchAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class CmsBlockCategoryWriterStep extends TouchAwareStep implements DataImportStepInterface
{
    const KEY_BLOCK_NAME = 'block_name';
    const KEY_CATEGORY_KEY = 'category_key';
    const KEY_CATEGORY_TEMPLATE_NAME = 'template_name';
    const KEY_CMS_BLOCK_CATEGORY_POSITION_NAME = 'cms_block_category_position_name';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $cmsBlockEntity = SpyCmsBlockQuery::create()->findOneByName($dataSet[static::KEY_BLOCK_NAME]);
        $categoryEntity = SpyCategoryQuery::create()->findOneByCategoryKey($dataSet[static::KEY_CATEGORY_KEY]);
        $categoryTemplateEntity = SpyCategoryTemplateQuery::create()->findOneByName($dataSet[static::KEY_CATEGORY_TEMPLATE_NAME]);
        $cmsBlockCategoryPositionEntity = SpyCmsBlockCategoryPositionQuery::create()->findOneByName($dataSet[static::KEY_CMS_BLOCK_CATEGORY_POSITION_NAME]);

        $cmsBlockCategoryConnectorEntity = SpyCmsBlockCategoryConnectorQuery::create()
            ->filterByFkCmsBlock($cmsBlockEntity->getIdCmsBlock())
            ->filterByFkCategory($categoryEntity->getIdCategory())
            ->filterByFkCategoryTemplate($categoryTemplateEntity->getIdCategoryTemplate())
            ->filterByFkCmsBlockCategoryPosition($cmsBlockCategoryPositionEntity->getIdCmsBlockCategoryPosition())
            ->findOneOrCreate();

        if ($cmsBlockCategoryConnectorEntity->isNew() || $cmsBlockCategoryConnectorEntity->isModified()) {
            $cmsBlockCategoryConnectorEntity->save();

            $this->addMainTouchable(
                CmsBlockCategoryConnectorConfig::RESOURCE_TYPE_CMS_BLOCK_CATEGORY_CONNECTOR,
                $cmsBlockCategoryConnectorEntity->getFkCategory()
            );
        }
    }
}
