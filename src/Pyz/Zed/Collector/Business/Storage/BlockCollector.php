<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Pyz\Zed\Collector\Business\Processor\PlaceholderProcessor;
use Spryker\Shared\Cms\CmsConstants;
use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePropelCollector;

class BlockCollector extends AbstractStoragePropelCollector
{

    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return CmsConstants::RESOURCE_TYPE_BLOCK;
    }

    /**
     * @param string $touchKey
     * @param array $collectItemData
     *
     * @return array
     */
    protected function collectItem($touchKey, array $collectItemData)
    {
        $placeholderProcessor = new PlaceholderProcessor($collectItemData['key'], $collectItemData['placeholder']);
        $placeholderCollection = $placeholderProcessor->toArray();

        return [
            'name' => $collectItemData['block_name'],
            'template' => $collectItemData['template_path'],
            'isActive' => $collectItemData['isActive'],
            'placeholders' => $placeholderCollection,
        ];
    }

    /**
     * @param mixed $data
     * @param string $localeName
     * @param array $collectedItemData
     *
     * @return string
     */
    protected function collectKey($data, $localeName, array $collectedItemData)
    {
        $blockName = $collectedItemData['block_name'];
        $blockName = $blockName . '-' . $collectedItemData['block_type'] . '-0';

        if (!empty($collectedItemData['block_type']) && $collectedItemData['block_value'] !== 0) {
            $blockName = $blockName . '-' . $collectedItemData['block_type'] . '-' . $collectedItemData['block_value'];
        }

        return $this->generateKey($blockName, $localeName);
    }

}
