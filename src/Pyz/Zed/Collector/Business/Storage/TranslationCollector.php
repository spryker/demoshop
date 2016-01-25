<?php

namespace Pyz\Zed\Collector\Business\Storage;

use Spryker\Zed\Collector\Business\Collector\KeyValue\AbstractKeyValuePropelCollector;

class TranslationCollector extends AbstractKeyValuePropelCollector
{

    /**
     * @param string $touchKey
     * @param array $collectItemData
     *
     * @return array
     */
    protected function collectItem($touchKey, array $collectItemData)
    {
        return [
            $touchKey => $collectItemData['translation_value'],
        ];
    }

    protected function collectResourceType()
    {
        return 'translation';
    }

    /**
     * @return string
     */
    public function getBundleName()
    {
        return 'glossary';
    }

}
