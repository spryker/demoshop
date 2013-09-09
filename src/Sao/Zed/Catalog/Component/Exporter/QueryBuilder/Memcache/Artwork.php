<?php

class Sao_Zed_Catalog_Component_Exporter_QueryBuilder_Memcache_Artwork extends ProjectA_Zed_Catalog_Component_Exporter_QueryBuilder_Memcache implements
    Sao_Shared_Library_Catalog_Interface_ProductAttributeSetConstant
{
    public function getAttributeSetName()
    {
        return self::ATTRIBUTESET_ARTWORK;
    }
}
