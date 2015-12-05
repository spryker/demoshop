<?php

namespace Pyz\Zed\Collector\Business\Storage;

use SprykerFeature\Shared\Category\CategoryConfig;
use SprykerFeature\Zed\Collector\Business\Exporter\AbstractPdoCollectorPlugin;

class NewCategoryNodeCollector extends AbstractPdoCollectorPlugin
{

    /**
     * @param array $collectItemData
     *
     * @return array
     */
    protected function collectItem(array $collectItemData)
    {
        return [
            'node_id' => $collectItemData[self::COLLECTOR_RESOURCE_ID],
            'name' => $collectItemData['name'],
            'url' => $collectItemData['url'],
            'image' => $collectItemData['category_image_name'],
            'children' => [],
            'parents' => [],
        ];
    }

    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return CategoryConfig::RESOURCE_TYPE_CATEGORY_NODE;
    }

}
