<?php
namespace Pyz\Zed\Catalog\Component\Internal;

use Pyz\Shared\Catalog\Code\ProductAttributeConstantInterface;
use Pyz\Shared\Catalog\Code\ProductAttributeSetConstantInterface;
use \ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer as ValueTypePeer;

/**
 * self::ATTRIBUTE_NAME => \ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT,
 * self::ATTRIBUTE_TAX_RATE => \ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_OPTIONSINGLE,
 * self::ATTRIBUTE_MAX_QUANTITY => \ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_INTEGER,
 *
 */
class AttributeToVarietyMapping implements
    ProductAttributeConstantInterface,
    ProductAttributeSetConstantInterface
{
    public static $attributesToVarietyMapping = [


        self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_CONFIG => [
            self::ATTRIBUTE_NAME => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_SHORT_DESCRIPTION => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_DESCRIPTION => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_TAX_RATE => ValueTypePeer::VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_BRAND => ValueTypePeer::VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_MANUFACTURER_DESCRIPTION => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_PAGE_TITLE => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_META_DESCRIPTION => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_META_KEYWORDS => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_URL => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_MATERIAL => ValueTypePeer::VARIETY_OPTIONSINGLE
        ],
        self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_SIMPLE => [
            self::ATTRIBUTE_NAME => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_SHORT_DESCRIPTION => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_DESCRIPTION => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_TAX_RATE => ValueTypePeer::VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_PAGE_TITLE => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_META_DESCRIPTION => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_META_KEYWORDS => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_MANUFACTURER_DESCRIPTION => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_URL => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_COLOR => ValueTypePeer::VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_DEPTH => ValueTypePeer::VARIETY_INTEGER,
            self::ATTRIBUTE_WIDTH => ValueTypePeer::VARIETY_INTEGER,
            self::ATTRIBUTE_HEIGHT => ValueTypePeer::VARIETY_INTEGER
        ],
        self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_SINGLE => [
            self::ATTRIBUTE_NAME => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_SHORT_DESCRIPTION => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_DESCRIPTION => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_TAX_RATE => ValueTypePeer::VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_BRAND => ValueTypePeer::VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_MANUFACTURER_DESCRIPTION => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_PAGE_TITLE => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_META_DESCRIPTION => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_META_KEYWORDS => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_URL => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_COLOR => ValueTypePeer::VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_DEPTH => ValueTypePeer::VARIETY_INTEGER,
            self::ATTRIBUTE_WIDTH => ValueTypePeer::VARIETY_INTEGER,
            self::ATTRIBUTE_HEIGHT => ValueTypePeer::VARIETY_INTEGER,
            self::ATTRIBUTE_MATERIAL => ValueTypePeer::VARIETY_OPTIONSINGLE
        ],
        self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_BUNDLE => [
            self::ATTRIBUTE_NAME => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_SHORT_DESCRIPTION => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_DESCRIPTION => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_TAX_RATE => ValueTypePeer::VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_BRAND => ValueTypePeer::VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_MANUFACTURER_DESCRIPTION => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_PAGE_TITLE => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_META_DESCRIPTION => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_META_KEYWORDS => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_URL => ValueTypePeer::VARIETY_TEXT,
            self::ATTRIBUTE_MATERIAL => ValueTypePeer::VARIETY_OPTIONSINGLE
        ],
    ];

    /**
     * @param string $attributeName
     * @param string $attributeSetName
     * @return string
     */
    public static function getVarietyForAttributeByAttributeSet($attributeName, $attributeSetName)
    {
        return isset(static::$attributesToVarietyMapping[$attributeSetName][$attributeName]) ? static::$attributesToVarietyMapping[$attributeSetName][$attributeName] : \ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT;
    }
}
