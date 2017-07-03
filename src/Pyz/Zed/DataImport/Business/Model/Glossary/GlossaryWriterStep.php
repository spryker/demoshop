<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Glossary;

use Orm\Zed\Glossary\Persistence\SpyGlossaryKeyQuery;
use Orm\Zed\Glossary\Persistence\SpyGlossaryTranslationQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\TouchAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\Glossary\GlossaryConfig;

class GlossaryWriterStep extends TouchAwareStep implements DataImportStepInterface
{

    const BULK_SIZE = 100;

    const KEY_KEY = 'key';
    const KEY_TRANSLATION = 'translation';
    const KEY_ID_LOCALE = 'idLocale';
    const KEY_LOCALE = 'locale';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $glossaryKeyEntity = SpyGlossaryKeyQuery::create()
            ->filterByKey($dataSet[static::KEY_KEY])
            ->findOneOrCreate();

        $glossaryKeyEntity->save();

        $glossaryTranslationEntity = SpyGlossaryTranslationQuery::create()
            ->filterByGlossaryKey($glossaryKeyEntity)
            ->filterByFkLocale($dataSet[static::KEY_ID_LOCALE])
            ->findOneOrCreate();

        $glossaryTranslationEntity
            ->setValue($dataSet[static::KEY_TRANSLATION])
            ->save();

        $this->addMainTouchable(GlossaryConfig::RESOURCE_TYPE_TRANSLATION, $glossaryTranslationEntity->getIdGlossaryTranslation());
    }

}
