<?php

/**
 * @property Generated_Zed_Catalog_Component_Factory $factory
 */
class Pyz_Zed_Catalog_Component_Facade extends ProjectA_Zed_Catalog_Component_Facade
{

    /**
     * @return \Pyz\Zed\Catalog\Component\Exporter\KeyValue\ProductsWithElectronicsExporter
     */
    public function getExporterKeyValueProductsWithElectronicsExporter()
    {
        return $this->factory->getExporterKeyValueProductsWithElectronicsExporter();
    }

    /**
     * @return \Pyz\Zed\Catalog\Component\Exporter\KeyValue\ProductsWithoutElectronicsExporter
     */
    public function getExporterKeyValueProductsWithoutElectronicsExporter()
    {
        return $this->factory->getExporterKeyValueProductsWithoutElectronicsExporter();
    }

    /**
     * @return \Pyz\Zed\Catalog\Component\Exporter\Solr\ProductsWithElectronicsExporter
     */
    public function getExporterSolrProductsWithElectronicsExporter()
    {
        return $this->factory->getExporterSolrProductsWithElectronicsExporter();
    }

    /**
     * @return \Pyz\Zed\Catalog\Component\Exporter\Solr\ProductsWithoutElectronicsExporter
     */
    public function getExporterSolrProductsWithoutElectronicsExporter()
    {
        return $this->factory->getExporterSolrProductsWithoutElectronicsExporter();
    }
}
