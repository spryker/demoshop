<?php

namespace Pyz\Zed\ProductFeed;

use Pyz\Shared\ProductFeed\ProductFeedConfig as ProductFeedConfigInterface;
use SprykerEngine\Zed\Kernel\AbstractBundleConfig;
use SprykerFeature\Shared\System\SystemConfig;

class ProductFeedConfig extends AbstractBundleConfig
{
    /**
     * @return string
     */
    public function getProductFeedFileLocation()
    {
        return $this->get(ProductFeedConfigInterface::PRODUCT_FEED_FILE_LOCATION);
    }

    /**
     * @return string
     */
    public function getProductFeedFileName()
    {
        return $this->get(ProductFeedConfigInterface::PRODUCT_FEED_FILE_NAME);
    }

    /**
     * @return string
     */
    public function getProductFeedUsers()
    {
        return $this->get(ProductFeedConfigInterface::PRODUCT_FEED_USERS);
    }

    /**
     * @return string
     */
    public function getProductFeedCsvParameters()
    {
        return $this->get(ProductFeedConfigInterface::PRODUCT_FEED_CSV_PARAMETERS);
    }

    /**
     * @return string
     */
    public function getHostYves()
    {
        return $this->get(SystemConfig::HOST_SSL_YVES);
    }

    /**
     * @return string
     */
    public function getHostStaticMedia()
    {
        return $this->get(SystemConfig::CLOUD_CDN_STATIC_MEDIA_HTTPS);
    }
}
