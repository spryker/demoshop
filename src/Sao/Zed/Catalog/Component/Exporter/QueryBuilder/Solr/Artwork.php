<?php

class Sao_Zed_Catalog_Component_Exporter_QueryBuilder_Solr_Artwork extends ProjectA_Zed_Catalog_Component_Exporter_QueryBuilder_Solr implements
    Sao_Shared_Catalog_Interface_ProductAttributeSetConstant
{
    public function getAttributeSetName()
    {
        return self::ATTRIBUTESET_ARTWORK;
    }
}
