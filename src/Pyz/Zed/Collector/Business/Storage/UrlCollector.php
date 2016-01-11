<?php

namespace Pyz\Zed\Collector\Business\Storage;

use Spryker\Shared\Kernel\Store;
use Spryker\Zed\Collector\Business\Collector\KeyValue\AbstractKeyValuePdoCollector;
use Spryker\Zed\Url\UrlConfig;

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
        $referenceKey = $this->generateResourceKey($resourceArguments, $this->locale->getLocaleName());

        return [
            'reference_key' => $referenceKey,
            'type' => $resourceArguments['resourceType'],
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
        return $this->generateKey($collectedItemData['url'], $localeName);
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

    /**
     * @param array $data
     * @param string $localeName
     *
     * @return string
     */
    protected function generateResourceKey($data, $localeName)
    {
        $keyParts = [
            Store::getInstance()->getStoreName(),
            $localeName,
            'resource',
            $data['resourceType'] . '.' . $data['value'],
        ];

        return $this->escapeKey(implode($this->keySeparator, $keyParts));
    }

}
