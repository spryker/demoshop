<?php


namespace Pyz\Zed\ProductFrontendExporterConnector\Communication;

use Generated\Zed\Ide\FactoryAutoCompletion\ProductFrontendExporterConnectorCommunication;
use ProjectA\Zed\ProductFrontendExporterConnector\Communication\ProductFrontendExporterConnectorDependencyContainer as CoreDependencyContainer;

/**
 * @property ProductFrontendExporterConnectorCommunication $factory
 */
class ProductFrontendExporterConnectorDependencyContainer extends CoreDependencyContainer
{
    public function getSettings()
    {
        return $this->factory->createProductFrontendExporterConnectorSettings($this->locator);
    }
}
