<?php
/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>, Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 */
class Sao_Zed_Catalog_Component_Model_Yves_QueryBuilder_Solr_Marketplace extends ProjectA_Zed_Catalog_Component_Exporter_QueryBuilder_Solr implements
    Sao_Shared_Library_Catalog_Interface_ProductAttributeSetConstant
{
    public function getAttributeSetName()
    {
        return self::ATTRIBUTESET_MARKETPLACE;
    }
}
