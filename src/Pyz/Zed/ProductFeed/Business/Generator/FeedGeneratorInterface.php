<?php

namespace Pyz\Zed\ProductFeed\Business\Generator;

use Pyz\Zed\ProductFeed\Business\Exception\InvalidProductFeedConfigException;

interface FeedGeneratorInterface
{
    /**
     * Creates the product feed csv file
     */
    public function generateFeed();

    /**
     * creates or updates a htpasswd, htpaccess and a product feed file
     * @throws InvalidProductFeedConfigException
     */
    public function generate();
}
