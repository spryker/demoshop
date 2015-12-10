<?php

namespace Pyz\Zed\Collector\Business\Storage;

use SprykerFeature\Zed\Collector\Business\Exporter\AbstractKeyValuePdoCollectorPlugin;
use SprykerFeature\Zed\Url\UrlConfig;

class UrlCollector extends AbstractKeyValuePdoCollectorPlugin
{

    /**
     * @var int
     */
    protected $chunkSize = 5000;

    /**
     * @param string $touchKey
     * @param array $collectItemData
     *
     * @return array
     */
    protected function collectItem($touchKey, array $collectItemData)
    {
        $resourceArguments = $this->findResourceArguments($collectItemData);

        return [
            'reference_key' => $touchKey,
            'type' => $resourceArguments['resourceType'],
        ];
    }

    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return UrlConfig::RESOURCE_TYPE_URL;
    }

    /**
     * @param array $url
     *
     * @return array
     */
    protected function findResourceArguments(array $url)
    {
        foreach ($url as $columnName => $value) {
            if (strpos($columnName, 'fk_resource_') !== 0) {
                continue;
            }
            if ($value !== null) {
                $resourceType = str_replace('fk_resource_', '', $columnName);
                $resourceType = str_replace('_id', '', $resourceType);

                return [
                    'resourceType' => $resourceType,
                    'value' => $value,
                ];
            }
        }

        return false;
    }

}
