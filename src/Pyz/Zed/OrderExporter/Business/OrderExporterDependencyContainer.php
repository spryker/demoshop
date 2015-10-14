<?php

namespace Pyz\Zed\OrderExporter\Business;

use Pyz\Zed\OrderExporter\OrderExporterDependencyProvider;
use SprykerEngine\Zed\Kernel\Business\AbstractBusinessDependencyContainer;
use Generated\Zed\Ide\FactoryAutoCompletion\OrderExporterBusiness;
use Pyz\Zed\OrderExporter\Dependency\Facade\OrderExporterToSalesInterface;
use Pyz\Zed\OrderExporter\OrderExporterConfig;

/**
 * @method OrderExporterConfig getConfig()
 * @method OrderExporterBusiness getFactory()
 */
class OrderExporterDependencyContainer extends AbstractBusinessDependencyContainer
{

    /**
     * @return OrderExporterToSalesInterface
     * @throws \ErrorException
     */
    public function getSalesFacade()
    {
        return $this->getProvidedDependency(OrderExporterDependencyProvider::FACADE_SALES);
    }

    /**
     * @return Model\OrderExporterManager
     */
    public function createOrderExporterManager()
    {
        return $this->getFactory()->createModelOrderExporterManager($this->getConfig());
    }

}
