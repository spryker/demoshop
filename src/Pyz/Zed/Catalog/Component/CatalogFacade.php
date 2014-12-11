<?php

namespace Pyz\Zed\Catalog\Component;

/**
 * @property \Generated\Zed\Catalog\Component\CatalogFactory $factory
 */
class CatalogFacade extends \ProjectA\Zed\Catalog\Component\CatalogFacade
{


    /**
     * @return Exporter\KeyValue\ProductsWithoutElectronicsConfigExporter
     */
    public function createExporterKeyValueProductsWithoutElectronicsConfigExporter()
    {
        return $this->factory->createExporterKeyValueProductsWithoutElectronicsConfigExporter();
    }

    /**
     * @return Exporter\KeyValue\ProductsWithoutElectronicsSimpleExporter
     */
    public function createExporterKeyValueProductsWithoutElectronicsSimpleExporter()
    {
        return $this->factory->createExporterKeyValueProductsWithoutElectronicsSimpleExporter();
    }

    /**
     * @return Exporter\KeyValue\ProductsWithoutElectronicsSingleExporter
     */
    public function createExporterKeyValueProductsWithoutElectronicsSingleExporter()
    {
        return $this->factory->createExporterKeyValueProductsWithoutElectronicsSingleExporter();
    }

    /**
     * @return Exporter\KeyValue\ProductsWithoutElectronicsBundleExporter
     */
    public function createExporterKeyValueProductsWithoutElectronicsBundleExporter()
    {
        return $this->factory->createExporterKeyValueProductsWithoutElectronicsBundleExporter();
    }
}
