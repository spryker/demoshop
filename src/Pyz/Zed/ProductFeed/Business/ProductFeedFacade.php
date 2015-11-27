<?php

namespace Pyz\Zed\ProductFeed\Business;

use SprykerEngine\Zed\Kernel\Business\AbstractFacade;

class ProductFeedFacade extends AbstractFacade
{
    /**
     * creates or updates the product feed csv file
     */
    public function generateProductFeed()
    {
        $this->getDependencyContainer()->createFeedGenerator()->generate();
    }
}