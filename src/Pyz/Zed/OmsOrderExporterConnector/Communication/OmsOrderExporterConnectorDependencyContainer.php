<?php

namespace Pyz\Zed\OmsOrderExporterConnector\Communication;

use Pyz\Zed\OmsOrderExporterConnector\OmsOrderExporterConnectorDependencyProvider;
use SprykerEngine\Zed\Kernel\Communication\AbstractCommunicationDependencyContainer;
use Pyz\Zed\OrderExporter\Business\OrderExporterFacade;

class OmsOrderExporterConnectorDependencyContainer extends AbstractCommunicationDependencyContainer
{
    /**
     * @return OrderExporterFacade
     */
    public function createOrderExporterFacade()
    {
        return $this->getProvidedDependency(OmsOrderExporterConnectorDependencyProvider::FACADE_ORDER_EXPORTER);
    }
}
