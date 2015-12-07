<?php

namespace Pyz\Zed\Collector\Business\Storage;

use SprykerFeature\Shared\Category\CategoryConfig;
use SprykerFeature\Zed\Collector\Business\Exporter\AbstractPdoCollectorPlugin;

class NewProductCollector extends AbstractPdoCollectorPlugin
{

    /**
     * @param array $collectItemData
     *
     * @return array
     */
    protected function collectItem(array $collectItemData)
    {
        return $collectItemData;
    }

    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return CategoryConfig::RESOURCE_TYPE_ABSTRACT_PRODUCT;
    }

}
