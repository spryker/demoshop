<?php

class Sao_Zed_Catalog_Component_Internal_AttributeToVarietyMapping implements
    ProjectA_Shared_Library_Catalog_Interface_ProductAttributeConstant,
    Sao_Zed_Catalog_Component_Interface_ProductAttributeConstant,
    Sao_Shared_Library_Catalog_Interface_ProductAttributeSetConstant,
    ProjectA_Zed_Catalog_Component_Interface_ProductVarietyConstant
{

    public static $attributesToVarietyMapping = [
        self::ATTRIBUTESET_ARTWORK => [
            self::ATTRIBUTE_TAX_RATE => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_DECIMAL,
            self::ATTRIBUTE_NAME => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_URL => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_DESCRIPTION => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_SHORT_DESCRIPTION => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,

            self::ATTRIBUTE_ART_TINY_CROP => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_ART_SMALL => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,

            self::ATTRIBUTE_ARTIST_USER_ID => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_INTEGER,
            self::ATTRIBUTE_USER_ART_ID => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_INTEGER,
            self::ATTRIBUTE_CURRENCY => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_OPTIONSINGLE,

            self::ATTRIBUTE_ARTIST_FIRST_NAME => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_ARTIST_LAST_NAME => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_ARTIST_EMAIL => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_ARTIST_PHONE => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_PRODUCT_SET => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_PRODUCT_CATEGORY => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_PRODUCT_ID => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_INTEGER,

            self::ATTRIBUTE_SHIP_WEIGHT => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_DECIMAL,
            self::ATTRIBUTE_SHIP_DEPTH => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_DECIMAL,
            self::ATTRIBUTE_SHIP_WIDTH => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_DECIMAL,
            self::ATTRIBUTE_SHIP_HEIGHT => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_DECIMAL,
            self::ATTRIBUTE_ORIGIN_ADDRESS1 => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_ORIGIN_ADDRESS2 => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_ORIGIN_CITY => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_ORIGIN_STATE => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_ORIGIN_PROVINCE => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_ORIGIN_REGION => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_ORIGIN_ZIPCODE => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_ORIGIN_COUNTRY => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_ORIGIN_COUNTRY_CODE => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_SHIP_WEIGHT_UNIT => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_SHIP_SIZE_UNIT => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_DUTY_CODE => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,

            self::ATTRIBUTE_VERIFIED_USER_ID => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_INTEGER,
            self::ATTRIBUTE_VERIFIED_DATE => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TIMESTAMP,
            self::ATTRIBUTE_WRAP_OPTION => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_PRODUCT_TYPE => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_PRODUCT_NAME => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,

            self::ATTRIBUTE_LE_START => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_INTEGER,
            self::ATTRIBUTE_LE_END => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_INTEGER,
        ]
    ];

    /**
     * @param $attributeName
     * @param $attributeSetName
     * @return string
     */
    public static function getVarietyForAttributeByAttributeSet($attributeName, $attributeSetName)
    {
        return
            isset(static::$attributesToVarietyMapping[$attributeSetName][$attributeName]) ?
                static::$attributesToVarietyMapping[$attributeSetName][$attributeName] :
                ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT;
    }
}
