<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\DataImportStep;

use Pyz\Zed\DataImport\Business\Model\Locale\AddLocalesStep;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class LocalizedAttributesExtractorStep implements DataImportStepInterface
{

    const KEY_LOCALIZED_ATTRIBUTES = 'localizedAttributes';

    /**
     * @var array
     */
    protected $attributeNames;

    /**
     * @param array $attributeNames
     */
    public function __construct(array $attributeNames)
    {
        $this->attributeNames = $attributeNames;
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $localizedAttributes = [];
        foreach ($dataSet[AddLocalesStep::KEY_LOCALES] as $localeName => $idLocale) {
            $attributes = [];

            foreach ($this->attributeNames as $attributeName) {
                $attributes[$attributeName] = $dataSet[$attributeName . '.' . $localeName];
            }

            $localizedAttributes[$idLocale] = $attributes;
        }

        $dataSet[static::KEY_LOCALIZED_ATTRIBUTES] = $localizedAttributes;
    }

}
