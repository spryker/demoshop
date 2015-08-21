<?php

namespace Pyz\Zed\Collector\Communication;

use Pyz\Zed\Collector\Business\CollectorFacade;
use SprykerFeature\Zed\Collector\CollectorDependencyProvider;
use SprykerFeature\Zed\Collector\Communication\CollectorDependencyContainer as SprykerCollectorDependencyContainer;

class CollectorDependencyContainer extends SprykerCollectorDependencyContainer
{

    /**
     * @return CollectorFacade
     */
    public function getCollectorFacade()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::FACADE_COLLECTOR);
    }

}