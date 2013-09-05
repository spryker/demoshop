<?php

class Sao_Zed_Yves_Component_Settings extends ProjectA_Zed_Yves_Component_Settings implements
    ProjectA_Zed_Cms_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Glossary_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Misc_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Category_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface
{
    use ProjectA_Zed_Cms_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Glossary_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Misc_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Category_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;

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
        //@TODO currently all exporters are activated to test them, remove unneeded later on
        $result[] = $this->facadeCms->getExporterMemcacheCms();
        $result[] = $this->facadeCms->getExporterMemcacheRedirection();
        $result[] = $this->facadeGlossary->getExporterMemcacheGlossary();
////        $result[] = $this->factory->getModelExportExporterMemcacheProductsArtwork();
        $result[] = $this->facadeCategory->getExporterMemcacheCategories();
////        $result[] = $this->factory->getModelExportExporterMemcacheProductOptions();
//        $result[] = $this->factory->getModelExportExporterMemcacheRegions();
        $result[] = $this->facadeMisc->getExporterMemcacheCountry();
        $result[] = $this->facadeCatalog->getExporterMemcacheBrands();
        $result[] = $this->facadeCatalog->getExporterMemcacheProductOptions();
        return $result;
    }
}
