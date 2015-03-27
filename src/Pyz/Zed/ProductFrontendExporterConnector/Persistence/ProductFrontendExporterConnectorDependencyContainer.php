<?php


namespace Pyz\Zed\ProductFrontendExporterConnector\Persistence;

use Generated\Zed\Ide\FactoryAutoCompletion\ProductFrontendExporterConnectorPersistence;
use ProjectA\Zed\ProductFrontendExporterConnector\Persistence\ProductFrontendExporterConnectorDependencyContainer as CoreDependencyContainer;

/**
 * @property ProductFrontendExporterConnectorPersistence $factory
 */
class ProductFrontendExporterConnectorDependencyContainer extends CoreDependencyContainer
{
    public function getSettings()
    {
        return $this->factory->createProductFrontendExporterConnectorSettings($this->locator);
    }
}
