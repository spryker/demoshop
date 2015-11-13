<?php

namespace Pyz\Zed\ProductFeed;

use Pyz\Shared\ProductFeed\ProductFeedConfig as ProductFeedConfigInterface;
use SprykerEngine\Zed\Kernel\AbstractBundleConfig;

class ProductFeedConfig extends AbstractBundleConfig
{
    public function getProductFeedFileLocation()
    {
        return $this->get(ProductFeedConfigInterface::PRODUCT_FEED_FILE_LOCATION);
    }

    public function getProductFeedFileName()
    {
        return $this->get(ProductFeedConfigInterface::PRODUCT_FEED_FILE_NAME);
    }

    public function getProductFeedUsers()
    {
        return $this->get(ProductFeedConfigInterface::PRODUCT_FEED_USERS);
    }
}