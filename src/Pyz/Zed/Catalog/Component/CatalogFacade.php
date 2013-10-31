<?php

namespace Pyz\Zed\Catalog\Component;

/**
 * @property \Generated\Zed\Catalog\Component\CatalogFactory $factory
 */
class CatalogFacade extends \ProjectA\Zed\Catalog\Component\CatalogFacade
{
    /**
     * @return \Pyz\Zed\Catalog\Component\Exporter\KeyValue\ProductsWithElectronicsExporter
     */
    public function createExporterKeyValueProductsWithElectronicsExporter()
    {
        return $this->factory->createExporterKeyValueProductsWithElectronicsExporter();
    }

    /**
     * @return \Pyz\Zed\Catalog\Component\Exporter\KeyValue\ProductsWithoutElectronicsExporter
     */
    public function createExporterKeyValueProductsWithoutElectronicsExporter()
    {
        return $this->factory->createExporterKeyValueProductsWithoutElectronicsExporter();
    }

    /**
     * @return \Pyz\Zed\Catalog\Component\Exporter\Solr\ProductsWithElectronicsExporter
     */
    public function createExporterSolrProductsWithElectronicsExporter()
    {
        return $this->factory->createExporterSolrProductsWithElectronicsExporter();
    }

    /**
     * @return \Pyz\Zed\Catalog\Component\Exporter\Solr\ProductsWithoutElectronicsExporter
     */
    public function createExporterSolrProductsWithoutElectronicsExporter()
    {
        return $this->factory->createExporterSolrProductsWithoutElectronicsExporter();
    }
}
