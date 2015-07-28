<?php

namespace Pyz\Zed\Collector\Business;

use Pyz\Zed\Collector\Business\Storage\ProductCollector;
use SprykerFeature\Zed\Collector\Business\CollectorDependencyContainer as SprykerCollectorDependencyContainer;

class CollectorDependencyContainer extends SprykerCollectorDependencyContainer
{

    /**
     * @return ProductCollector
     */
    public function createStorageProductCollector()
    {
        return $this->getFactory()->createStorageProductCollector();
    }

}