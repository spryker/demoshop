<?php

class Sao_Zed_Yves_Component_Settings extends ProjectA_Zed_Yves_Component_Settings implements
    ProjectA_Zed_Cms_Component_Dependency_Facade_Interface
{
    use ProjectA_Zed_Cms_Component_Dependency_Facade_Trait;

    /**
     * @param string $exportIdentifier
     * @return array
     */
    public function getSolrExporters($exportIdentifier)
    {
        $result = parent::getSolrExporters($exportIdentifier);
        $result[] = $this->factory->getModelExportExporterSolrProducts();
        return $result;
    }

    /**
     * @param string $exportIdentifier
     * @return array
     */
    public function getMemcacheExporters($exportIdentifier)
    {
        $result[] = $this->facadeCms->getExporterMemcacheCms();
        $result[] = $this->facadeCms->getExporterMemcacheRedirection();
//        $result[] = $this->factory->getModelExportExporterMemcacheGlossary();
////        $result[] = $this->factory->getModelExportExporterMemcacheProductsArtwork();
//        $result[] = $this->factory->getModelExportExporterMemcacheCategories();
////        $result[] = $this->factory->getModelExportExporterMemcacheProductOptions();
//        $result[] = $this->factory->getModelExportExporterMemcacheRegions();
//        $result[] = $this->factory->getModelExportExporterMemcacheCountry();
        return $result;
    }
}
