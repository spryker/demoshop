<?php

namespace Pyz\Zed\ProductFeed\Business;

use SprykerEngine\Zed\Kernel\Business\AbstractBusinessDependencyContainer;
use Pyz\Zed\ProductFeed\ProductFeedDependencyProvider;
use Pyz\Zed\ProductFeed\Business\Generator\FeedGenerator;

class ProductFeedDependencyContainer extends AbstractBusinessDependencyContainer
{
    /**
     * @return FeedGenerator
     * @throws \ErrorException
     */
    public function createFeedGenerator()
    {
        return $this->getFactory()->createGeneratorFeedGenerator(
            $this->getConfig(),
            $this->getProvidedDependency(ProductFeedDependencyProvider::PRODUCT_QUERY_CONTAINER)
        );
    }
}