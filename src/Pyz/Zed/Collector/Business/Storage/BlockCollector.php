<?php

namespace Pyz\Zed\Collector\Business\Storage;

use SprykerFeature\Shared\Cms\CmsConfig;
use SprykerFeature\Zed\Collector\Business\Collector\KeyValue\AbstractKeyValuePropelCollector;

class BlockCollector extends AbstractKeyValuePropelCollector
{

    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return CmsConfig::RESOURCE_TYPE_BLOCK;
    }

    /**
     * @param string $touchKey
     * @param array $collectItemData
     *
     * @return array
     */
    protected function collectItem($touchKey, array $collectItemData)
    {
        $placeholders = isset($collectItemData[$touchKey]['placeholders']) ? $collectItemData[$touchKey]['placeholders'] : [];
        $placeholders[$collectItemData['placeholder']] = $collectItemData['translation_key'];

        return [
            'name' => $collectItemData['block_name'],
            'template' => $collectItemData['template_path'],
            'isActive' => $collectItemData['isActive'],
            'placeholders' => $placeholders,
        ];
    }

    /**
     * @param $data
     * @param $localeName
     * @param array $collectedItemData
     *
     * @return string
     */
    protected function collectKey($data, $localeName, array $collectedItemData)
    {
        $blockName = $collectedItemData['block_name'];
        if (!empty($block['block_type']) && $collectedItemData['block_value'] !== 0) {
            $blockName = $blockName . '-' . $collectedItemData['block_type'] . '-' . $collectedItemData['block_value'];
        } else {
            $blockName = $blockName . '-' . $collectedItemData['block_type'] . '-0';
        }

        return $this->generateKey($blockName, $localeName);
    }

}
