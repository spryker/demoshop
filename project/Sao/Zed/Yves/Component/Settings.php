<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_Yves_Component_Settings extends ProjectA_Zed_Yves_Component_Settings
{


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
        $result[] = $this->factory->getModelExportExporterMemcacheCms();
        $result[] = $this->factory->getModelExportExporterMemcacheRedirection();
        $result[] = $this->factory->getModelExportExporterMemcacheGlossary();
//        $result[] = $this->factory->getModelExportExporterMemcacheProductsArtwork();
        $result[] = $this->factory->getModelExportExporterMemcacheCategories();
//        $result[] = $this->factory->getModelExportExporterMemcacheProductOptions();
        $result[] = $this->factory->getModelExportExporterMemcacheRegions();
        $result[] = $this->factory->getModelExportExporterMemcacheCountry();
        return $result;
    }
}
