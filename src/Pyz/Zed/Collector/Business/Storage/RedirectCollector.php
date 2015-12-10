<?php

namespace Pyz\Zed\Collector\Business\Storage;

use SprykerFeature\Zed\Collector\Business\Exporter\AbstractKeyValuePropelCollectorPlugin;
use SprykerFeature\Zed\Url\UrlConfig;

class RedirectCollector extends AbstractKeyValuePropelCollectorPlugin
{

    const KEY_FROM_URL = 'from_url';
    const KEY_TO_URL = 'to_url';
    const KEY_STATUS = 'status';
    const KEY_ID = 'id';

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
