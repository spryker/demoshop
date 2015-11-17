<?php

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Propel\Runtime\ActiveQuery\Criteria;
use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Orm\Zed\Touch\Persistence\SpyTouchQuery;
use SprykerFeature\Shared\Cms\CmsConfig;
use SprykerFeature\Shared\Collector\Code\KeyBuilder\KeyBuilderTrait;
use Orm\Zed\Cms\Persistence\Map\SpyCmsGlossaryKeyMappingTableMap;
use Orm\Zed\Cms\Persistence\Map\SpyCmsPageTableMap;
use Orm\Zed\Cms\Persistence\Map\SpyCmsTemplateTableMap;
use SprykerFeature\Zed\Collector\Business\Exporter\AbstractPropelCollectorPlugin;
use SprykerFeature\Zed\Collector\Business\Exporter\Writer\KeyValue\TouchUpdaterSet;
use Orm\Zed\Glossary\Persistence\Map\SpyGlossaryKeyTableMap;
use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;

class PageCollector extends AbstractPropelCollectorPlugin
{

    use KeyBuilderTrait;

    protected function getTouchItemType()
    {
        return 'page';
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     *
     * @return SpyTouchQuery
     */
    protected function createQuery(SpyTouchQuery $baseQuery, LocaleTransfer $locale)
    {
        $baseQuery->addJoin(
            SpyTouchTableMap::COL_ITEM_ID,
            SpyCmsPageTableMap::COL_ID_CMS_PAGE,
            Criteria::INNER_JOIN
        );

        $baseQuery->addJoin(
            SpyCmsPageTableMap::COL_ID_CMS_PAGE,
            SpyUrlTableMap::COL_FK_RESOURCE_PAGE,
            Criteria::LEFT_JOIN
        );

        $baseQuery->addJoin(
            SpyCmsPageTableMap::COL_ID_CMS_PAGE,
            SpyCmsGlossaryKeyMappingTableMap::COL_FK_PAGE,
            Criteria::INNER_JOIN
        );

        $baseQuery->addJoin(
            SpyCmsPageTableMap::COL_FK_TEMPLATE,
            SpyCmsTemplateTableMap::COL_ID_CMS_TEMPLATE,
            Criteria::INNER_JOIN
        );

        $baseQuery->addJoin(
            SpyCmsGlossaryKeyMappingTableMap::COL_FK_GLOSSARY_KEY,
            SpyGlossaryKeyTableMap::COL_ID_GLOSSARY_KEY,
            Criteria::INNER_JOIN
        );

        $baseQuery->clearSelectColumns();
        $baseQuery->withColumn(SpyCmsPageTableMap::COL_ID_CMS_PAGE, 'page_id');
        $baseQuery->withColumn(SpyUrlTableMap::COL_URL, 'page_url');
        $baseQuery->withColumn(SpyCmsGlossaryKeyMappingTableMap::COL_PLACEHOLDER, 'placeholder');
        $baseQuery->withColumn(SpyCmsTemplateTableMap::COL_TEMPLATE_PATH, 'template_path');
        $baseQuery->withColumn(SpyGlossaryKeyTableMap::COL_KEY, 'translation_key');

        return $baseQuery;
    }

    /**
     * @param array $resultSet
     * @param LocaleTransfer $locale
     * @param TouchUpdaterSet $touchUpdaterSet
     *
     * @return array
     */
    protected function processData($resultSet, LocaleTransfer $locale, TouchUpdaterSet $touchUpdaterSet)
    {
        $processedResultSet = [];

        foreach ($resultSet as $index => $page) {
            $pageKey = $this->generateKey($page['page_id'], $locale->getLocaleName());

            $processedResultSet[$pageKey] = isset($processedResultSet[$pageKey]) ? $processedResultSet[$pageKey] : [];
            $processedResultSet[$pageKey]['url'] = $page['page_url'];
            $processedResultSet[$pageKey]['id'] = $page['page_id'];
            $processedResultSet[$pageKey]['template'] = $page['template_path'];
            $processedResultSet[$pageKey]['placeholders'] = isset($processedResultSet[$pageKey]['placeholders']) ? $processedResultSet[$pageKey]['placeholders'] : [];
            $processedResultSet[$pageKey]['placeholders'][$page['placeholder']] = $page['translation_key'];
        }

        return $processedResultSet;
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
        return CmsConfig::RESOURCE_TYPE_PAGE;
    }

}
