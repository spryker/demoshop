<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\DataImport\Business\Model\Glossary;

use ArrayObject;
use Orm\Zed\Glossary\Persistence\SpyGlossaryKeyQuery;
use Orm\Zed\Glossary\Persistence\SpyGlossaryTranslationQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;

class GlossaryWriterStep implements DataImportStepInterface
{

    const DATA_SET_KEY_KEY = 'key';
    const DATA_SET_KEY_TRANSLATION = 'translation';
    const DATA_SET_KEY_ID_LOCALE = 'idLocale';

    /**
     * @param \ArrayObject $dataSet
     *
     * @return void
     */
    public function execute(ArrayObject $dataSet)
    {
        $query = SpyGlossaryKeyQuery::create();
        $glossaryKeyEntity = $query->filterByKey($dataSet[static::DATA_SET_KEY_KEY])->findOneOrCreate();
        $glossaryKeyEntity->save();

        $query = SpyGlossaryTranslationQuery::create();
        $glossaryKeyEntity = $query->filterByGlossaryKey($glossaryKeyEntity)->filterByFkLocale($dataSet[static::DATA_SET_KEY_ID_LOCALE])->findOneOrCreate();
        $glossaryKeyEntity->setValue($dataSet[static::DATA_SET_KEY_TRANSLATION]);
        $glossaryKeyEntity->save();
    }


}
