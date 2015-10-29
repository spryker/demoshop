<?php

namespace Pyz\Zed\Glossary\Persistence;

use SprykerFeature\Zed\Glossary\Persistence\GlossaryQueryContainer as SprykerGlossaryQueryContainer;
use SprykerFeature\Zed\Glossary\Persistence\Propel\Map\SpyGlossaryKeyTableMap;
use SprykerEngine\Zed\Locale\Persistence\Propel\Map\SpyLocaleTableMap;

class GlossaryQueryContainer extends SprykerGlossaryQueryContainer
{
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
