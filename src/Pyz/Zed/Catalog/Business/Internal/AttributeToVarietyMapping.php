<?php
namespace Pyz\Zed\Catalog\Business\Internal;

use Pyz\Shared\Catalog\Code\ProductAttributeConstantInterface;
use Pyz\Shared\Catalog\Code\ProductAttributeSetConstantInterface;
use \ProjectA\Zed\Catalog\Persistence\Propel\Map\PacCatalogValueTypeTableMap as ValueTypePeer;

/**
 * self::ATTRIBUTE_NAME => \ProjectA\Zed\Catalog\Persistence\Propel\Map\PacCatalogValueTypeTableMap::COL_VARIETY_TEXT,
 * self::ATTRIBUTE_TAX_RATE => \ProjectA\Zed\Catalog\Persistence\Propel\Map\PacCatalogValueTypeTableMap::COL_VARIETY_OPTIONSINGLE,
 * self::ATTRIBUTE_MAX_QUANTITY => \ProjectA\Zed\Catalog\Persistence\Propel\Map\PacCatalogValueTypeTableMap::COL_VARIETY_INTEGER,
 *
 */
// TODO check if class can be deleted its only used in the installer
class AttributeToVarietyMapping implements
    ProductAttributeConstantInterface,
    ProductAttributeSetConstantInterface
{
    public static $attributesToVarietyMapping = [


        self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_CONFIG => [
            self::ATTRIBUTE_NAME => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_SHORT_DESCRIPTION => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_DESCRIPTION => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_TAX_RATE => ValueTypePeer::COL_VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_BRAND => ValueTypePeer::COL_VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_MANUFACTURER_DESCRIPTION => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_PAGE_TITLE => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_META_DESCRIPTION => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_META_KEYWORDS => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_URL => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_MATERIAL => ValueTypePeer::COL_VARIETY_OPTIONSINGLE
        ],
        self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_SIMPLE => [
            self::ATTRIBUTE_NAME => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_SHORT_DESCRIPTION => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_DESCRIPTION => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_TAX_RATE => ValueTypePeer::COL_VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_PAGE_TITLE => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_META_DESCRIPTION => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_META_KEYWORDS => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_MANUFACTURER_DESCRIPTION => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_URL => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_COLOR => ValueTypePeer::COL_VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_DEPTH => ValueTypePeer::COL_VARIETY_INTEGER,
            self::ATTRIBUTE_WIDTH => ValueTypePeer::COL_VARIETY_INTEGER,
            self::ATTRIBUTE_HEIGHT => ValueTypePeer::COL_VARIETY_INTEGER
        ],
        self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_SINGLE => [
            self::ATTRIBUTE_NAME => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_SHORT_DESCRIPTION => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_DESCRIPTION => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_TAX_RATE => ValueTypePeer::COL_VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_BRAND => ValueTypePeer::COL_VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_MANUFACTURER_DESCRIPTION => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_PAGE_TITLE => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_META_DESCRIPTION => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_META_KEYWORDS => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_URL => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_COLOR => ValueTypePeer::COL_VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_DEPTH => ValueTypePeer::COL_VARIETY_INTEGER,
            self::ATTRIBUTE_WIDTH => ValueTypePeer::COL_VARIETY_INTEGER,
            self::ATTRIBUTE_HEIGHT => ValueTypePeer::COL_VARIETY_INTEGER,
            self::ATTRIBUTE_MATERIAL => ValueTypePeer::COL_VARIETY_OPTIONSINGLE
        ],
        self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_BUNDLE => [
            self::ATTRIBUTE_NAME => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_SHORT_DESCRIPTION => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_DESCRIPTION => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_TAX_RATE => ValueTypePeer::COL_VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_BRAND => ValueTypePeer::COL_VARIETY_OPTIONSINGLE,
            self::ATTRIBUTE_MANUFACTURER_DESCRIPTION => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_PAGE_TITLE => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_META_DESCRIPTION => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_META_KEYWORDS => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_URL => ValueTypePeer::COL_VARIETY_TEXT,
            self::ATTRIBUTE_MATERIAL => ValueTypePeer::COL_VARIETY_OPTIONSINGLE
        ],
    ];

    /**
     * @param string $attributeName
     * @param string $attributeSetName
     * @return string
     */
    public static function getVarietyForAttributeByAttributeSet($attributeName, $attributeSetName)
    {
        return isset(static::$attributesToVarietyMapping[$attributeSetName][$attributeName]) ? static::$attributesToVarietyMapping[$attributeSetName][$attributeName] : \ProjectA\Zed\Catalog\Persistence\Propel\Map\PacCatalogValueTypeTableMap::COL_VARIETY_TEXT;
    }
}
