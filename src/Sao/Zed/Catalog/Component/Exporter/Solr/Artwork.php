<?php

class Sao_Zed_Catalog_Component_Exporter_Solr_Artwork extends Sao_Zed_Catalog_Component_Exporter_Solr_Products
{

    /**
     * @return string
     */
    public function getCoreName()
    {
        return null; //default
        //return ProjectA_Shared_Library_Store::getInstance()->getSolrCore();
    }

    /**
     * @return string
     */
    protected function getProductAttributeSetName()
    {
        return self::ATTRIBUTESET_ARTWORK;
    }

    /**
     * @return Sao_Zed_Catalog_Component_Exporter_QueryBuilder_Solr_Artwork
     */
    protected function getProductQueryBuilder()
    {
        return $this->factory->getExporterQueryBuilderSolrArtwork();
    }
}
