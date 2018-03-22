<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Product;

use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class ProductLocalizedAttributesExtractorStep implements DataImportStepInterface
{
    const KEY_LOCALIZED_ATTRIBUTES = 'localizedAttributes';

    /**
     * @var array
     */
    protected $defaultAttributes = [];

    /**
     * @param array $defaultAttributes
     */
    public function __construct(array $defaultAttributes = [])
    {
        $this->defaultAttributes = $defaultAttributes;
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $keysToUnset = [];
        $localizedAttributes = [];
        foreach ($dataSet['locales'] as $localeName => $idLocale) {
            $attributes = [];
            foreach ($dataSet as $key => $value) {
                if (!preg_match('/^attribute_key_(\d+).' . $localeName . '$/', $key, $match)) {
                    continue;
                }

                $attributeValueKey = 'value_' . $match[1] . '.' . $localeName;
                $attributeKey = trim($value);
                $attributeValue = trim($dataSet[$attributeValueKey]);

                if ($attributeKey !== '') {
                    $attributes[$attributeKey] = $attributeValue;
                }

                $keysToUnset[] = $match[0];
                $keysToUnset[] = $attributeValueKey;
            }

            $localizedAttributes[$idLocale] = [
                'attributes' => $attributes,
            ];

            foreach ($this->defaultAttributes as $defaultAttribute) {
                $localizedAttributes[$idLocale][$defaultAttribute] = $dataSet[$defaultAttribute . '.' . $localeName];

                $keysToUnset[] = $defaultAttribute . '.' . $localeName;
            }
        }

        foreach ($keysToUnset as $key) {
            unset($dataSet[$key]);
        }

        $dataSet[static::KEY_LOCALIZED_ATTRIBUTES] = $localizedAttributes;
    }
}
