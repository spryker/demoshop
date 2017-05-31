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

    const BULK_SIZE = 50;

    const DATA_SET_KEY_KEY = 'key';
    const DATA_SET_KEY_TRANSLATION = 'translation';
    const DATA_SET_KEY_ID_LOCALE = 'idLocale';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $query = SpyGlossaryKeyQuery::create();
        $glossaryKeyEntity = $query->filterByKey($dataSet[static::DATA_SET_KEY_KEY])->findOneOrCreate();
        $glossaryKeyEntity->save();

        $query = SpyGlossaryTranslationQuery::create();
        $glossaryTranslationEntity = $query->filterByGlossaryKey($glossaryKeyEntity)->filterByFkLocale($dataSet[static::DATA_SET_KEY_ID_LOCALE])->findOneOrCreate();
        $glossaryTranslationEntity->setValue($dataSet[static::DATA_SET_KEY_TRANSLATION]);
        $glossaryTranslationEntity->save();

        $this->addMainTouchable(GlossaryConfig::RESOURCE_TYPE_TRANSLATION, $glossaryTranslationEntity->getIdGlossaryTranslation());
    }

}
