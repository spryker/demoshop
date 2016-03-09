<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

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
        $placeholderNames = explode(',', $collectItemData['placeholder']);
        $keys = explode(',', $collectItemData['key']);

        $step = 0;
        $placeholderCollection = [];
        foreach ($placeholderNames as $name) {
            $placeholderCollection[$name] = $keys[$step];
            $step++;
        }

        return [
            'url' => $collectItemData['page_url'],
            'id' => $collectItemData['page_id'],
            'template' => $collectItemData['template_path'],
            'placeholders' => $placeholderCollection,
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
