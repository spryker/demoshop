<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Persistence\Storage\Propel;

use Orm\Zed\Cms\Persistence\Map\SpyCmsGlossaryKeyMappingTableMap;
use Orm\Zed\Cms\Persistence\Map\SpyCmsPageTableMap;
use Orm\Zed\Cms\Persistence\Map\SpyCmsTemplateTableMap;
use Orm\Zed\Glossary\Persistence\Map\SpyGlossaryKeyTableMap;
use Orm\Zed\Locale\Persistence\Map\SpyLocaleTableMap;
use Orm\Zed\Touch\Persistence\Map\SpyTouchStorageTableMap;
use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Spryker\Zed\Collector\Persistence\Collector\AbstractPropelCollectorQuery;

class PageCollectorQuery extends AbstractPropelCollectorQuery
{

    /**
     * @return void
     */
    protected function prepareQuery()
    {
        $this->touchQuery->addJoin(
            SpyTouchTableMap::COL_ITEM_ID,
            SpyCmsPageTableMap::COL_ID_CMS_PAGE,
            Criteria::INNER_JOIN
        );
        $this->touchQuery->addJoin(
            SpyCmsPageTableMap::COL_ID_CMS_PAGE,
            SpyUrlTableMap::COL_FK_RESOURCE_PAGE,
            Criteria::INNER_JOIN
        );
        $this->touchQuery->addJoin(
            SpyUrlTableMap::COL_FK_LOCALE,
            SpyLocaleTableMap::COL_ID_LOCALE,
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
            'GROUP_CONCAT('.SpyCmsGlossaryKeyMappingTableMap::COL_PLACEHOLDER.')',
            'placeholder'
        );

        $this->touchQuery->withColumn(
            SpyCmsTemplateTableMap::COL_TEMPLATE_PATH,
            'template_path'
        );

        $this->touchQuery->withColumn(
            'GROUP_CONCAT('.SpyGlossaryKeyTableMap::COL_KEY.')',
            'key'
        );

        $this->touchQuery->withColumn(SpyCmsPageTableMap::COL_ID_CMS_PAGE, 'page_id');
        $this->touchQuery->withColumn(SpyUrlTableMap::COL_URL, 'page_url');

        $this->touchQuery->addGroupByColumn(SpyTouchTableMap::COL_ID_TOUCH);
        $this->touchQuery->addGroupByColumn(SpyTouchTableMap::COL_ITEM_EVENT);
        $this->touchQuery->addGroupByColumn(SpyTouchTableMap::COL_ITEM_TYPE);
        $this->touchQuery->addGroupByColumn(SpyTouchTableMap::COL_ITEM_ID);
        $this->touchQuery->addGroupByColumn(SpyTouchTableMap::COL_TOUCHED);
        $this->touchQuery->addGroupByColumn(SpyTouchStorageTableMap::COL_ID_TOUCH_STORAGE);
        $this->touchQuery->addGroupByColumn(SpyCmsPageTableMap::COL_ID_CMS_PAGE);
        $this->touchQuery->addGroupByColumn(SpyCmsTemplateTableMap::COL_TEMPLATE_PATH);
        $this->touchQuery->addGroupByColumn(SpyUrlTableMap::COL_URL);
    }

}
