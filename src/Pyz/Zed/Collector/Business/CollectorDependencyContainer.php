<?php

namespace Pyz\Zed\Collector\Business;

use Pyz\Zed\Collector\Business\Storage\ProductCollector;
use Pyz\Zed\Collector\CollectorDependencyProvider;
use SprykerFeature\Zed\Collector\Business\CollectorDependencyContainer as SprykerCollectorDependencyContainer;

class CollectorDependencyContainer extends SprykerCollectorDependencyContainer
{

    /**
     * @return ProductCollector
     */
    public function createStorageProductCollector()
    {
        return $this->getFactory()->createStorageProductCollector(
            $this->getProvidedDependency(CollectorDependencyProvider::FACADE_PRICE),
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_PRICE),
            $this->getProvidedDependency(CollectorDependencyProvider::FACADE_CATEGORY_EXPORTER),
            $this->getProvidedDependency(CollectorDependencyProvider::QUERY_CONTAINER_CATEGORY)
        );
    }

}