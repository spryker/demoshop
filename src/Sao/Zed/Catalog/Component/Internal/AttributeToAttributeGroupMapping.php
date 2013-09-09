<?php

class Sao_Zed_Catalog_Component_Internal_AttributeToAttributeGroupMapping implements
    ProjectA_Zed_Catalog_Component_Interface_GroupConstant,
    ProjectA_Shared_Catalog_Interface_ProductAttributeConstant,
    Sao_Zed_Catalog_Component_Interface_ProductAttributeConstant
{
    /**
     * sample how to define attributes into groups, ! do not confound with attributeSetGroups
     *
     *  self::ATTRIBUTE_NAME => array(
     *      self::MEMCACHE_EXPORT,
     *      self::SOLR_SEARCHABLE,
     *      self::SOLR_SUGGESTION,
     *      self::SOLR_SORT,
     *      self::MANDATORY_ON_IMPORT,
     *      self::MANDATORY_ON_DISPLAY_IN_SHOP
     *  ),
     *
     * @var array
     */
    public static $attributesToGroupMapping = array(
        self::ATTRIBUTE_ARTIST_USER_ID    => array(
            self::MEMCACHE_EXPORT
        ),
        self::ATTRIBUTE_ARTIST_FIRST_NAME => array(
            self::MEMCACHE_EXPORT
        ),
        self::ATTRIBUTE_ARTIST_LAST_NAME  => array(
            self::MEMCACHE_EXPORT
        ),
        self::ATTRIBUTE_PRODUCT_TYPE      => array(
            self::MEMCACHE_EXPORT
        ),
        self::ATTRIBUTE_ORIGIN_REGION     => array(
            self::MEMCACHE_EXPORT
        ),
        self::ATTRIBUTE_ORIGIN_COUNTRY    => array(
            self::MEMCACHE_EXPORT
        ),
        self::ATTRIBUTE_SHIP_WIDTH        => array(
            self::MEMCACHE_EXPORT
        ),
        self::ATTRIBUTE_SHIP_HEIGHT       => array(
            self::MEMCACHE_EXPORT
        ),
    );
}
