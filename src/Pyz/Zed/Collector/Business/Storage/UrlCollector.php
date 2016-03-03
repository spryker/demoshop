<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Spryker\Shared\Kernel\Store;
use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePdoCollector;
use Spryker\Zed\Url\UrlConfig;

class UrlCollector extends AbstractStoragePdoCollector
{

    const FK_RESOURCE_ = 'fk_resource_';
    const RESOURCE_TYPE = 'resourceType';
    const VALUE = 'value';
    const TYPE = 'type';
    const REFERENCE_KEY = 'reference_key';

    /**
     * @var int
     */
    protected $chunkSize = 2000;

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
            self::REFERENCE_KEY => $referenceKey,
            self::TYPE => $resourceArguments[self::RESOURCE_TYPE],
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
     * @param array $data
     *
     * @return array
     */
    protected function findResourceArguments(array $data)
    {
        foreach ($data as $columnName => $value) {
            if (!$this->isFkResourceUrl($columnName, $value)) {
                continue;
            }

            $resourceType = str_replace(self::FK_RESOURCE_, '', $columnName);

            return [
                self::RESOURCE_TYPE => $resourceType,
                self::VALUE => $value,
            ];
        }

        return false;
    }

    /**
     * @param string $columnName
     * @param string $value
     *
     * @return bool
     */
    protected function isFkResourceUrl($columnName, $value)
    {
        return $value !== null && strpos($columnName, self::FK_RESOURCE_) === 0;
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
            $data[self::RESOURCE_TYPE] . '.' . $data[self::VALUE],
        ];

        return $this->escapeKey(implode($this->keySeparator, $keyParts));
    }

    /**
     * @param mixed $data
     * @param string $localeName
     *
     * @return array
     */
    protected function getKeyParts($data, $localeName)
    {
        return [
            Store::getInstance()->getStoreName(),
            $localeName,
            $this->buildKey($data),
        ];
    }

    /**
     * @return string
     */
    public function getBundleName()
    {
        return 'url';
    }

}
