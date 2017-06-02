<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\CmsPage;

use Pyz\Zed\DataImport\Business\Model\Locale\AddLocalesStep;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class PlaceholderExtractorStep implements DataImportStepInterface
{

    const KEY_PLACEHOLDER = 'placeholder';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $localizedPlaceholder = [];
        foreach ($dataSet[AddLocalesStep::KEY_LOCALES] as $localeName => $idLocale) {
            $placeholder = [];

            foreach ($dataSet as $key => $value) {
                if (!preg_match('/^placeholder_name.(\d+)$/', $key, $match)) {
                    continue;
                }

                $placeholderValueKey = 'placeholder_value.' . $match[1] . '.' . $localeName;
                $placeholder[$value] = $dataSet[$placeholderValueKey];
            }

            $localizedPlaceholder[$idLocale] = $placeholder;
        }

        $dataSet[self::KEY_PLACEHOLDER] = $localizedPlaceholder;
    }

}
