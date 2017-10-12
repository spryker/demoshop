<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductSet;

use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class ProductSetImageExtractorStep implements DataImportStepInterface
{
    const KEY_TARGET = 'productImageSets';

    const IMAGE_SET_KEY_PREFIX = 'image_set.';
    const IMAGE_SMALL_KEY_PREFIX = 'image_small.';
    const IMAGE_LARGE_KEY_PREFIX = 'image_large.';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $imageSets = [];
        foreach ($dataSet as $key => $value) {
            if (preg_match('/' . static::IMAGE_SET_KEY_PREFIX . '(\d+)/', $key, $match)) {
                $imageSets[$match[1]] = [
                    'image_set' => $value,
                    'images' => [],
                ];
            }
        }
        foreach ($dataSet as $key => $value) {
            if (preg_match('/' . static::IMAGE_SMALL_KEY_PREFIX . '(\d+).(\d+)/', $key, $match)) {
                $imageSets[$match[1]]['images'][$match[2]]['image_small'] = $value;
            }
            if (preg_match('/' . static::IMAGE_LARGE_KEY_PREFIX . '(\d+).(\d+)/', $key, $match)) {
                $imageSets[$match[1]]['images'][$match[2]]['image_large'] = $value;
            }
        }

        $dataSet[static::KEY_TARGET] = $imageSets;
    }
}
