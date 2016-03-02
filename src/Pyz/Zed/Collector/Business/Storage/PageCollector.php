<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Spryker\Shared\Cms\CmsConstants;
use Spryker\Zed\Collector\Business\Collector\KeyValue\AbstractKeyValuePropelCollector;

class PageCollector extends AbstractKeyValuePropelCollector
{

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
            'url' => $collectItemData['page_url'],
            'id' => $collectItemData['page_id'],
            'template' => $collectItemData['template_path'],
            'placeholders' => $placeholders,
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
