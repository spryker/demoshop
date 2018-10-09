<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePropelCollector;
use Spryker\Zed\Url\UrlConfig;

class RedirectCollector extends AbstractStoragePropelCollector
{
    public const KEY_FROM_URL = 'from_url';
    public const KEY_TO_URL = 'to_url';
    public const KEY_STATUS = 'status';
    public const KEY_ID = 'id';

    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return UrlConfig::RESOURCE_TYPE_REDIRECT;
    }

    /**
     * @param string $touchKey
     * @param array $collectItemData
     *
     * @return array
     */
    protected function collectItem($touchKey, array $collectItemData)
    {
        return [
            self::KEY_FROM_URL => $collectItemData[self::KEY_FROM_URL],
            self::KEY_TO_URL => $collectItemData[self::KEY_TO_URL],
            self::KEY_STATUS => $collectItemData[self::KEY_STATUS],
            self::KEY_ID => $collectItemData[self::KEY_ID],
        ];
    }
}
