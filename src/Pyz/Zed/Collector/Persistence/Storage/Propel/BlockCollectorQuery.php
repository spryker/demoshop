<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Persistence\Storage\Propel;

use Orm\Zed\Cms\Persistence\Map\SpyCmsBlockTableMap;
use Orm\Zed\Cms\Persistence\Map\SpyCmsGlossaryKeyMappingTableMap;
use Orm\Zed\Cms\Persistence\Map\SpyCmsPageTableMap;
use Orm\Zed\Cms\Persistence\Map\SpyCmsTemplateTableMap;
use Orm\Zed\Glossary\Persistence\Map\SpyGlossaryKeyTableMap;
use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Spryker\Zed\Collector\Persistence\Collector\AbstractPropelCollectorQuery;

class BlockCollectorQuery extends AbstractPropelCollectorQuery
{

    const BLOCK_ID = 'block_id';
    const BLOCK_NAME = 'block_name';
    const BLOCK_TYPE = 'block_type';
    const BLOCK_VALUE = 'block_value';
    const PLACEHOLDER = 'placeholder';
    const TEMPLATE_PATH = 'template_path';
    const IS_ACTIVE = 'isActive';
    const TRANSLATION_KEY = 'translation_key';

    /**
     * @return void
     */
    protected function prepareQuery()
    {
        $this->touchQuery->addJoin(
            SpyTouchTableMap::COL_ITEM_ID,
            SpyCmsBlockTableMap::COL_ID_CMS_BLOCK,
            Criteria::INNER_JOIN
        );
        $this->touchQuery->addJoin(
            SpyCmsBlockTableMap::COL_FK_PAGE,
            SpyCmsPageTableMap::COL_ID_CMS_PAGE,
            Criteria::INNER_JOIN
        );
        $this->touchQuery->addJoin(
            SpyCmsPageTableMap::COL_ID_CMS_PAGE,
            SpyCmsGlossaryKeyMappingTableMap::COL_FK_PAGE,
            Criteria::INNER_JOIN
        );
        $this->touchQuery->addJoin(
            SpyCmsPageTableMap::COL_FK_TEMPLATE,
            SpyCmsTemplateTableMap::COL_ID_CMS_TEMPLATE,
            Criteria::INNER_JOIN
        );
        $this->touchQuery->addJoin(
            SpyCmsGlossaryKeyMappingTableMap::COL_FK_GLOSSARY_KEY,
            SpyGlossaryKeyTableMap::COL_ID_GLOSSARY_KEY,
            Criteria::INNER_JOIN
        );

        $this->touchQuery->addAnd(
            SpyUrlTableMap::COL_FK_LOCALE,
            $this->getLocale()->getIdLocale(),
            Criteria::EQUAL
        );

        $this->touchQuery->withColumn(
            'GROUP_CONCAT(' . SpyCmsGlossaryKeyMappingTableMap::COL_PLACEHOLDER . ')',
            'placeholder'
        );
        $this->touchQuery->withColumn(
            SpyCmsTemplateTableMap::COL_TEMPLATE_PATH,
            'template_path'
        );

        $this->touchQuery->withColumn(
            'GROUP_CONCAT(' . SpyGlossaryKeyTableMap::COL_KEY . ')',
            'key'
        );

        $this->touchQuery->withColumn(SpyCmsBlockTableMap::COL_ID_CMS_BLOCK, self::BLOCK_ID);
        $this->touchQuery->withColumn(SpyCmsBlockTableMap::COL_NAME, self::BLOCK_NAME);
        $this->touchQuery->withColumn(SpyCmsBlockTableMap::COL_TYPE, self::BLOCK_TYPE);
        $this->touchQuery->withColumn(SpyCmsBlockTableMap::COL_VALUE, self::BLOCK_VALUE);
        $this->touchQuery->addGroupByColumn(SpyCmsTemplateTableMap::COL_TEMPLATE_PATH);
        $this->touchQuery->withColumn(SpyCmsPageTableMap::COL_IS_ACTIVE, self::IS_ACTIVE);
    }

}
