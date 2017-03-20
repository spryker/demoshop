<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Pyz\Zed\Collector\Business\Processor\PlaceholderProcessor;
use Spryker\Shared\Cms\CmsConstants;
use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePropelCollector;

class PageCollector extends AbstractStoragePropelCollector
{

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
            'url' => $collectItemData['page_url'],
            'valid_from' => $collectItemData['valid_from'],
            'valid_to' => $collectItemData['valid_to'],
            'is_active' => $collectItemData['is_active'],
            'id' => $collectItemData['page_id'],
            'template' => $collectItemData['template_path'],
            'placeholders' => $placeholderCollection,
            'name' => $collectItemData['name'],
            'meta_title' => $collectItemData['meta_title'],
            'meta_keywords' => $collectItemData['meta_keywords'],
            'meta_description' => $collectItemData['meta_description'],
        ];
    }

    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return CmsConstants::RESOURCE_TYPE_PAGE;
    }

}
