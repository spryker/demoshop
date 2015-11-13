<?php

namespace Pyz\Zed\ProductFeed\Business;

use SprykerEngine\Zed\Kernel\Business\AbstractFacade;

class ProductFeedFacade extends AbstractFacade
{
    public function generateProductFeed()
    {
        $this->getDependencyContainer()->createFeedGenerator()->generate();
    }
}