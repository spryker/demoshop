<?php

namespace Pyz\Zed\Glossary\Persistence;

use SprykerFeature\Zed\Glossary\Persistence\GlossaryQueryContainer as SprykerGlossaryQueryContainer;
use Orm\Zed\Glossary\Persistence\Map\SpyGlossaryKeyTableMap;
use Orm\Zed\Locale\Persistence\Map\SpyLocaleTableMap;
use Orm\Zed\Glossary\Persistence\SpyGlossaryTranslationQuery;

class GlossaryQueryContainer extends SprykerGlossaryQueryContainer
{
    /**
     * @return SpyGlossaryTranslationQuery
     */
    public function queryKeysWithTranslations()
    {
        return $this->queryTranslations()
            ->useGlossaryKeyQuery()
            ->withColumn(SpyGlossaryKeyTableMap::COL_KEY)
            ->endUse()
            ->useLocaleQuery()
            ->withColumn(SpyLocaleTableMap::COL_LOCALE_NAME)
            ->endUse()
            ->groupByFkGlossaryKey();
    }
}
