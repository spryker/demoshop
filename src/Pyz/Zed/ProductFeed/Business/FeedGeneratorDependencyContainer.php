<?php

namespace Pyz\Zed\ProductFeed\Business;

use SprykerEngine\Zed\Kernel\Business\AbstractBusinessDependencyContainer;
use Pyz\Zed\ProductFeed\ProductFeedDependencyProvider;

class FeedGeneratorDependencyContainer extends AbstractBusinessDependencyContainer
{
    public function createFeedGenerator()
    {
        return $this->getFactory()->createGeneratorFeedGenerator(
            $this->getConfig(),
            $this->getProvidedDependency(ProductFeedDependencyProvider::PRODUCT_QUERY_CONTAINER)
        );
    }
}