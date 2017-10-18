<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Product;

use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class AttributesExtractorStep implements DataImportStepInterface
{
    const KEY_ATTRIBUTES = 'attributes';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $keysToUnset = [];
        $attributes = [];
        foreach ($dataSet as $key => $value) {
            if (!preg_match('/^attribute_key_(\d+)$/', $key, $match)) {
                continue;
            }

            $attributeValueKey = 'value_' . $match[1];
            $attributeKey = trim($value);
            $attributeValue = trim($dataSet[$attributeValueKey]);

            if ($attributeKey !== '') {
                $attributes[$attributeKey] = $attributeValue;
            }

            $keysToUnset[] = $match[0];
            $keysToUnset[] = $attributeValueKey;
        }

        foreach ($keysToUnset as $key) {
            unset($dataSet[$key]);
        }

        $dataSet[static::KEY_ATTRIBUTES] = $attributes;
    }
}
