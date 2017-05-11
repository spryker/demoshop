<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\DataImport\Business\Model\Locale;

use ArrayObject;
use Orm\Zed\Locale\Persistence\SpyLocaleQuery;
use Pyz\Zed\DataImport\Business\Exception\LocaleNotFoundByNameException;
use Spryker\Zed\DataImport\Business\Exception\DataKeyNotFoundInDataSetException;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;

class LocaleNameToIdLocaleStep implements DataImportStepInterface
{

    const KEY_LOCALE_NAME = 'localeName';
    const KEY_ID_LOCALE = 'idLocale';

    /**
     * @var array
     */
    protected $resolved = [];

    /**
     * @param \ArrayObject $dataSet
     *
     * @throws \Spryker\Zed\DataImport\Business\Exception\DataKeyNotFoundInDataSetException
     *
     * @return void
     */
    public function execute(ArrayObject $dataSet)
    {
        if (!isset($dataSet[static::KEY_LOCALE_NAME])) {
            throw new DataKeyNotFoundInDataSetException(sprintf(
                'Expected a key "%s" in current data set. Available keys: "%s"',
                static::KEY_LOCALE_NAME,
                implode(', ', array_keys($dataSet->getArrayCopy()))
            ));
        }

        if (!isset($this->resolved[$dataSet[static::KEY_LOCALE_NAME]])) {
            $this->resolved[$dataSet[static::KEY_LOCALE_NAME]] = $this->resolveIdLocale($dataSet[static::KEY_LOCALE_NAME]);
        }

//        $dataSet[static::KEY_ID_LOCALE] = $this->resolved[$dataSet[static::KEY_LOCALE_NAME]];
    }

    /**
     * @param string $localeName
     *
     * @throws \Pyz\Zed\DataImport\Business\Exception\LocaleNotFoundByNameException
     *
     * @return int
     */
    protected function resolveIdLocale($localeName)
    {
        $query = SpyLocaleQuery::create();
        $localeEntity = $query->findOneByLocaleName($localeName);

        if (!$localeEntity) {
            throw new LocaleNotFoundByNameException(sprintf('Locale by name "%s" not found.', $localeName));
        }

        return $localeEntity->getIdLocale();
    }


}
