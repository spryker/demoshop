<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Persistence\Storage\Propel;

use Orm\Zed\Glossary\Persistence\Map\SpyGlossaryKeyTableMap;
use Orm\Zed\Glossary\Persistence\Map\SpyGlossaryTranslationTableMap;
use Orm\Zed\Locale\Persistence\Map\SpyLocaleTableMap;
use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Spryker\Zed\Collector\Persistence\Collector\AbstractPropelCollectorQuery;

class TranslationCollectorQuery extends AbstractPropelCollectorQuery
{
    /**
     * @return void
     */
    protected function prepareQuery()
    {
        $this->touchQuery->addJoin(
            SpyTouchTableMap::COL_ITEM_ID,
            SpyGlossaryTranslationTableMap::COL_ID_GLOSSARY_TRANSLATION,
            Criteria::INNER_JOIN
        );
        $this->touchQuery->addJoin(
            SpyGlossaryTranslationTableMap::COL_FK_GLOSSARY_KEY,
            SpyGlossaryKeyTableMap::COL_ID_GLOSSARY_KEY,
            Criteria::INNER_JOIN
        );
        $this->touchQuery->addJoin(
            SpyGlossaryTranslationTableMap::COL_FK_LOCALE,
            SpyLocaleTableMap::COL_ID_LOCALE,
            Criteria::INNER_JOIN
        );

        $this->touchQuery->addAnd(
            SpyLocaleTableMap::COL_ID_LOCALE,
            $this->getLocale()->getIdLocale(),
            Criteria::EQUAL
        );
        $this->touchQuery->addAnd(
            SpyGlossaryKeyTableMap::COL_IS_ACTIVE,
            true,
            Criteria::EQUAL
        );
        $this->touchQuery->addAnd(
            SpyGlossaryTranslationTableMap::COL_IS_ACTIVE,
            true,
            Criteria::EQUAL
        );

        $this->touchQuery->withColumn(SpyGlossaryTranslationTableMap::COL_VALUE, 'translation_value');
        $this->touchQuery->withColumn(SpyGlossaryKeyTableMap::COL_KEY, 'translation_key');
    }
}
