<?php

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Propel\Runtime\ActiveQuery\Criteria;
use SprykerEngine\Zed\Locale\Persistence\Propel\Map\SpyLocaleTableMap;
use SprykerEngine\Zed\Touch\Persistence\Propel\Map\SpyTouchTableMap;
use SprykerEngine\Zed\Touch\Persistence\Propel\SpyTouchQuery;
use SprykerFeature\Shared\Glossary\Code\KeyBuilder\GlossaryKeyBuilder;
use SprykerFeature\Zed\Collector\Business\Exporter\AbstractPropelCollectorPlugin;
use SprykerFeature\Zed\Collector\Business\Exporter\Writer\KeyValue\TouchUpdaterSet;
use SprykerFeature\Zed\Glossary\Persistence\Propel\Map\SpyGlossaryKeyTableMap;
use SprykerFeature\Zed\Glossary\Persistence\Propel\Map\SpyGlossaryTranslationTableMap;

class TranslationCollector extends AbstractPropelCollectorPlugin
{

    use GlossaryKeyBuilder;

    protected function getTouchItemType()
    {
        return 'translation';
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
            SpyGlossaryTranslationTableMap::COL_ID_GLOSSARY_TRANSLATION,
            Criteria::INNER_JOIN
        );
        $baseQuery->addJoin(
            SpyGlossaryTranslationTableMap::COL_FK_GLOSSARY_KEY,
            SpyGlossaryKeyTableMap::COL_ID_GLOSSARY_KEY,
            Criteria::INNER_JOIN
        );
        $baseQuery->addJoin(
            SpyGlossaryTranslationTableMap::COL_FK_LOCALE,
            SpyLocaleTableMap::COL_ID_LOCALE,
            Criteria::INNER_JOIN
        );

        $baseQuery->addAnd(SpyLocaleTableMap::COL_LOCALE_NAME, $locale->getLocaleName(), Criteria::EQUAL);
        $baseQuery->addAnd(SpyLocaleTableMap::COL_IS_ACTIVE, true, Criteria::EQUAL);
        $baseQuery->addAnd(SpyGlossaryKeyTableMap::COL_IS_ACTIVE, true, Criteria::EQUAL);
        $baseQuery->addAnd(SpyGlossaryTranslationTableMap::COL_IS_ACTIVE, true, Criteria::EQUAL);

        $baseQuery->clearSelectColumns();

        $baseQuery->withColumn(SpyGlossaryTranslationTableMap::COL_VALUE, 'translation_value');
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

        foreach ($resultSet as $index => $translation) {
            $key = $this->generateKey($translation['translation_key'], $locale->getLocaleName());
            $processedResultSet[$key] = $translation['translation_value'];
        }

        return $processedResultSet;
    }

}
