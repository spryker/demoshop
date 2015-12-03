<?php

namespace Pyz\Shared\Library;

use SprykerFeature\Shared\Library\Cloud;
use SprykerFeature\Shared\Library\Config;
use SprykerFeature\Shared\ProductImage\ProductImageConfig;
use SprykerFeature\Shared\System\SystemConfig;

class Image
{
    const PLACEHOLDER_PRODUCT_ZED = 'default-product-image.jpg';
    const PLACEHOLDER_PRODUCT_YVES = 'default.png';

    const HTTPS = 'https';
    const HTTP = 'http';

    protected static $imageBaseUrl;
    protected static $config;

    /**
     * @param string $filename
     *
     * @return string
     */
    public static function getAbsoluteProductImageUrl($image)
    {
        $filename = (isset($image['url'])) ? $image['url'] : '';

        if ($filename === '') {
            switch (APPLICATION) {
                case 'ZED':
                    $filename = self::PLACEHOLDER_PRODUCT_ZED;
                    break;
                case 'YVES':
                    $filename = self::PLACEHOLDER_PRODUCT_YVES;
                    break;
            }
        }

        /* ONLY FOR CLOUD HOSTING SETUP USED */
        if (Cloud::isCloudStorageCdnEnabled()) {
            return self::getAbsoluteProductImageUrlForCloudUsage($filename);
        }

        $relativeUrl = implode('/', [
            self::getStaticMediaUrl(),
            Config::get(ProductImageConfig::PRODUCT_IMAGE_IMAGE_URL_PREFIX), $filename,
        ]);

        return self::getSchema() . $relativeUrl;
    }

    /**
     * @param string $objectName
     *
     * @return string
     */
    protected static function getAbsoluteProductImageUrlForCloudUsage($objectName)
    {
        if (static::getProtocol() === self::HTTP) {
            $host = Config::get(SystemConfig::CLOUD_CDN_STATIC_MEDIA_HTTP);
        } else {
            $host = Config::get(SystemConfig::CLOUD_CDN_STATIC_MEDIA_HTTPS);
        }

        $relativeUrl = implode('/', [
            $host,
            Config::get(SystemConfig::CLOUD_CDN_STATIC_MEDIA_PREFIX),
            Config::get(SystemConfig::CLOUD_CDN_PRODUCT_IMAGES_PATH_NAME),
            $objectName
        ]);

        return self::getSchema() . $relativeUrl;
    }

    /**
     * @return string
     */
    protected static function getStaticMediaUrl()
    {
        if (self::HTTPS === self::getProtocol()) {
            return Config::get(SystemConfig::HOST_SSL_STATIC_MEDIA);
        }

        return Config::get(SystemConfig::HOST_STATIC_MEDIA);
    }

    /**
     * @return string
     */
    protected static function getProtocol()
    {
        if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] === 'on' || $_SERVER['HTTPS'] === 1)
            || isset($_SERVER['X-Forwarded-Proto']) && $_SERVER['X-Forwarded-Proto'] === 'https'
        ) {
            return self::HTTPS;
        }

        return self::HTTP;
    }

    /**
     * @return string
     */
    protected static function getSchema()
    {
        $protocol = self::getProtocol();

        return $protocol . '://';
    }

}
