<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductManagementAttribute;

use Pyz\Zed\DataImport\Business\Model\Locale\AddLocalesStep;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class ProductManagementLocalizedAttributesExtractorStep implements DataImportStepInterface
{
    const KEY_LOCALIZED_ATTRIBUTES = 'localizedAttributes';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $localizedAttributes = [];
        foreach ($dataSet[AddLocalesStep::KEY_LOCALES] as $localeName => $idLocale) {
            $valueTranslations = '';
            $values = $this->toArray($dataSet['values']);
            if (!empty($dataSet['value_translations.' . $localeName])) {
                $valueTranslations = $this->toArray($dataSet['value_translations.' . $localeName]);
                $valueTranslations = array_combine($this->toArray($dataSet['values']), $valueTranslations);
            }

            $attributes = [
                'key_translation' => $dataSet['key_translation.' . $localeName],
                'values' => $values,
                'value_translations' => $valueTranslations,
            ];

            $localizedAttributes[$idLocale] = $attributes;
        }

        $dataSet[static::KEY_LOCALIZED_ATTRIBUTES] = $localizedAttributes;
    }

    /**
     * @param string $data
     *
     * @return array
     */
    private function toArray($data)
    {
        return array_map('trim', explode(',', $data));
    }
}
