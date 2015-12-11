<?php

namespace Pyz\Zed\Collector\Persistence\Storage\Propel;

use Orm\Zed\Cms\Persistence\Map\SpyCmsGlossaryKeyMappingTableMap;
use Orm\Zed\Cms\Persistence\Map\SpyCmsPageTableMap;
use Orm\Zed\Cms\Persistence\Map\SpyCmsTemplateTableMap;
use Orm\Zed\Glossary\Persistence\Map\SpyGlossaryKeyTableMap;
use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use SprykerFeature\Zed\Collector\Persistence\Exporter\AbstractPropelCollectorQuery;

class PageCollector extends AbstractPropelCollectorQuery
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
            Criteria::LEFT_JOIN
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

        $this->touchQuery->withColumn(SpyCmsPageTableMap::COL_ID_CMS_PAGE, 'page_id');
        $this->touchQuery->withColumn(SpyUrlTableMap::COL_URL, 'page_url');
        $this->touchQuery->withColumn(SpyCmsGlossaryKeyMappingTableMap::COL_PLACEHOLDER, 'placeholder');
        $this->touchQuery->withColumn(SpyCmsTemplateTableMap::COL_TEMPLATE_PATH, 'template_path');
        $this->touchQuery->withColumn(SpyGlossaryKeyTableMap::COL_KEY, 'translation_key');
    }

}
