<?php
/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>, Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 */
class Sao_Zed_Catalog_Component_Model_Yves_QueryBuilder_Memcache_Artwork extends ProjectA_Zed_Catalog_Component_Model_Yves_QueryBuilder_Memcache implements
    Sao_Shared_Library_Catalog_Interface_ProductAttributeSetConstant
{
    public function getAttributeSetName()
    {
        return self::ATTRIBUTESET_ARTWORK;
    }
}
