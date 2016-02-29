<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Orm\Zed\Cms\Persistence\Map\SpyCmsBlockTableMap;
use Orm\Zed\Cms\Persistence\Map\SpyCmsGlossaryKeyMappingTableMap;
use Orm\Zed\Cms\Persistence\Map\SpyCmsPageTableMap;
use Orm\Zed\Cms\Persistence\Map\SpyCmsTemplateTableMap;
use Orm\Zed\Glossary\Persistence\Map\SpyGlossaryKeyTableMap;
use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Orm\Zed\Touch\Persistence\SpyTouchQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Spryker\Shared\Cms\CmsConstants;
use Spryker\Shared\Collector\Code\KeyBuilder\KeyBuilderTrait;
use Spryker\Zed\Collector\Business\Exporter\AbstractPropelCollectorPlugin;
use Spryker\Zed\Collector\Business\Exporter\Writer\KeyValue\TouchUpdaterSet;

class BlockCollector extends AbstractPropelCollectorPlugin
{

    use KeyBuilderTrait;

    /**
     * @return string
     */
    protected function getTouchItemType()
    {
        return 'block';
    }

    /**
     * @param \Orm\Zed\Touch\Persistence\SpyTouchQuery $baseQuery
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     *
     * @return \Orm\Zed\Touch\Persistence\SpyTouchQuery
     */
    protected function createQuery(SpyTouchQuery $baseQuery, LocaleTransfer $locale)
    {
        $baseQuery->addJoin(
            SpyTouchTableMap::COL_ITEM_ID,
            SpyCmsBlockTableMap::COL_ID_CMS_BLOCK,
            Criteria::INNER_JOIN
        );
        $baseQuery->addJoin(
            SpyCmsBlockTableMap::COL_FK_PAGE,
            SpyCmsPageTableMap::COL_ID_CMS_PAGE,
            Criteria::INNER_JOIN
        );
        $baseQuery->addJoin(
            SpyCmsPageTableMap::COL_ID_CMS_PAGE,
            SpyCmsGlossaryKeyMappingTableMap::COL_FK_PAGE,
            Criteria::LEFT_JOIN
        );
        $baseQuery->addJoin(
            SpyCmsPageTableMap::COL_FK_TEMPLATE,
            SpyCmsTemplateTableMap::COL_ID_CMS_TEMPLATE,
            Criteria::INNER_JOIN
        );
        $baseQuery->addJoin(
            SpyCmsGlossaryKeyMappingTableMap::COL_FK_GLOSSARY_KEY,
            SpyGlossaryKeyTableMap::COL_ID_GLOSSARY_KEY,
            Criteria::LEFT_JOIN
        );

        $baseQuery->clearSelectColumns();
        $baseQuery->withColumn(SpyCmsBlockTableMap::COL_ID_CMS_BLOCK, 'block_id');
        $baseQuery->withColumn(SpyCmsBlockTableMap::COL_NAME, 'block_name');
        $baseQuery->withColumn(SpyCmsBlockTableMap::COL_TYPE, 'block_type');
        $baseQuery->withColumn(SpyCmsBlockTableMap::COL_VALUE, 'block_value');
        $baseQuery->withColumn(SpyCmsGlossaryKeyMappingTableMap::COL_PLACEHOLDER, 'placeholder');
        $baseQuery->withColumn(SpyCmsTemplateTableMap::COL_TEMPLATE_PATH, 'template_path');
        $baseQuery->withColumn(SpyCmsPageTableMap::COL_IS_ACTIVE, 'isActive');
        $baseQuery->withColumn(SpyGlossaryKeyTableMap::COL_KEY, 'translation_key');
        $baseQuery->withColumn(SpyTouchTableMap::COL_ID_TOUCH, self::TOUCH_EXPORTER_ID);

        return $baseQuery;
    }

    /**
     * @param array $resultSet
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     * @param \Spryker\Zed\Collector\Business\Exporter\Writer\KeyValue\TouchUpdaterSet $touchUpdaterSet
     *
     * @return array
     */
    protected function processData($resultSet, LocaleTransfer $locale, TouchUpdaterSet $touchUpdaterSet)
    {
        $returnedResultSet = [];

        foreach ($resultSet as $index => $block) {
            $blockName = $block['block_name'];
            if (!empty($block['block_type']) && $block['block_value'] !== 0) {
                $blockName = $blockName . '-' . $block['block_type'] . '-' . $block['block_value'];
            } else {
                $blockName = $blockName . '-' . $block['block_type'] . '-0';
            }

            $blockKey = $this->generateKey($blockName, $locale->getLocaleName());
            $returnedResultSet[$blockKey] = isset($returnedResultSet[$blockKey]) ? $returnedResultSet[$blockKey] : [];
            $returnedResultSet[$blockKey]['name'] = $block['block_name'];
            $returnedResultSet[$blockKey]['template'] = $block['template_path'];
            $returnedResultSet[$blockKey]['isActive'] = $block['isActive'];
            $returnedResultSet[$blockKey]['placeholders'] = isset($returnedResultSet[$blockKey]['placeholders']) ? $returnedResultSet[$blockKey]['placeholders'] : [];
            $returnedResultSet[$blockKey]['placeholders'][$block['placeholder']] = $block['translation_key'];

            $touchUpdaterSet->add($blockKey, $block[self::TOUCH_EXPORTER_ID]);
        }

        return $returnedResultSet;
    }

    /**
     * @param string $identifier
     *
     * @return string
     */
    protected function buildKey($identifier)
    {
        return $this->getResourceType() . '.' . $identifier;
    }

    /**
     * @return string
     */
    public function getBundleName()
    {
        return 'resource';
    }

    /**
     * @return string
     */
    protected function getResourceType()
    {
        return CmsConstants::RESOURCE_TYPE_BLOCK;
    }

}
