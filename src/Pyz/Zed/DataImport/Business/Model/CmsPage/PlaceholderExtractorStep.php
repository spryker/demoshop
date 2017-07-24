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
     * @var array
     */
    protected $placeholderNames;

    /**
     * @param array $attributeNames
     */
    public function __construct(array $attributeNames)
    {
        $this->placeholderNames = $attributeNames;
    }

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

            foreach ($this->placeholderNames as $placeholderName) {
                $key = str_replace('placeholder.', '', $placeholderName);
                $placeholder[$key] = $dataSet[$placeholderName . '.' . $localeName];
            }

            $localizedPlaceholder[$idLocale] = $placeholder;
        }

        $dataSet[self::KEY_PLACEHOLDER] = $localizedPlaceholder;
    }

}
