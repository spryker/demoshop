<?php

namespace Pyz\Zed\Collector\Business\Storage;

use SprykerFeature\Zed\Collector\Business\Collector\KeyValue\AbstractKeyValuePdoCollector;
use SprykerFeature\Zed\Url\UrlConfig;

class UrlCollector extends AbstractKeyValuePdoCollector
{

    /**
     * @var int
     */
    protected $chunkSize = 2000;

    /**
     * @var array
     */
    protected $resourceArgumentsCache = [];

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
    protected function findResourceArguments(array &$url)
    {
        foreach ($url as $columnName => $value) {
            if (isset($this->resourceArgumentsCache[$columnName])) {
                $resourceType = $this->resourceArgumentsCache[$columnName];

                return [
                    'resourceType' => $resourceType,
                    'value' => $value,
                ];
            }

            if ($value === null || strpos($columnName, 'fk_resource_') !== 0) {
                continue;
            }

            $resourceType = str_replace('fk_resource_', '', $columnName);
            $this->resourceArgumentsCache[$columnName] = $resourceType;

            return [
                'resourceType' => $resourceType,
                'value' => $value,
            ];
        }

        return false;
    }

}
