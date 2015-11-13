<?php

namespace Pyz\Zed\ProductFeed\Business;

use SprykerEngine\Zed\Kernel\Business\AbstractBusinessDependencyContainer;

class FeedGeneratorDependencyContainer extends AbstractBusinessDependencyContainer
{
    public function createFeedGenerator()
    {
        return $this->getFactory()->createGeneratorFeedGenerator(/* @TODO: dependencies */);
    }
}