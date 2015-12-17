<?php

namespace Pyz\Zed\Collector\Communication;

use Pyz\Zed\Collector\Business\CollectorFacade;
use Spryker\Zed\Collector\CollectorDependencyProvider;
use Spryker\Zed\Collector\Communication\CollectorCommunicationFactory as SprykerCollectorCommunicationFactory;

class CollectorCommunicationFactory extends SprykerCollectorCommunicationFactory
{

    /**
     * @return CollectorFacade
     */
    public function getCollectorFacade()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::FACADE_COLLECTOR);
    }

}
