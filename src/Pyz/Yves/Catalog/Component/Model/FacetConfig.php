<?php
namespace Pyz\Yves\Catalog\Component\Model;

use ProjectA\Yves\Catalog\Component\Model\FacetConfig as CoreFacetConfig;

/**
 * @package Pyz\Yves\Catalog\Component\Model
 */
class FacetConfig extends CoreFacetConfig
{
    /**
     * //TODO fill with valid values, e.g. param names, active
     * @var array
     */
    protected static $facets = [
        'number_facet_price' => [
            self::KEY_TYPE => self::TYPE_SLIDER,
            self::KEY_PARAM => 'price',
            self::KEY_ACTIVE => true,
            self::KEY_RANGE_DIVIDER => '-',
            self::KEY_VALUE_CALLBACK_BEFORE => [__CLASS__, 'priceValueCallbackBefore'],
            self::KEY_VALUE_CALLBACK_AFTER => [__CLASS__, 'priceValueCallbackAfter']
        ],
        'int_facet_category' => [
            self::KEY_TYPE => self::TYPE_CATEGORY,
            self::KEY_PARAM => 'category',
            self::KEY_ACTIVE => true,
            self::KEY_IN_URL => true,
            self::KEY_SHORT_PARAM => 'c',
            self::KEY_URL_POSITION => 0
        ],
        'int_facet_height' => [
            self::KEY_TYPE => self::TYPE_ENUMERATION,
            self::KEY_PARAM => 'cat', //maybe revoke because cat is part of the url
            self::KEY_ACTIVE => false
        ],
        'int_facet_depth' => [
            self::KEY_TYPE => self::TYPE_ENUMERATION,
            self::KEY_PARAM => 'depth',
            self::KEY_ACTIVE => false
        ],
        'int_facet_width' => [
            self::KEY_TYPE => self::TYPE_ENUMERATION,
            self::KEY_PARAM => 'width',
            self::KEY_ACTIVE => false
        ],
        'string_facet_brand' => [
            self::KEY_TYPE => self::TYPE_ENUMERATION,
            self::KEY_PARAM => 'brand',
            self::KEY_ACTIVE => true,
            self::KEY_IN_URL => true,
            self::KEY_SHORT_PARAM => 'b',
            self::KEY_URL_POSITION => 1,
            self::KEY_MULTI_VALUED => true
        ],
        'string_facet_color' => [
            self::KEY_TYPE => self::TYPE_ENUMERATION,
            self::KEY_PARAM => 'color',
            self::KEY_ACTIVE => true,
            self::KEY_MULTI_VALUED => true
        ],
        'string_facet_material' => [
            self::KEY_TYPE => self::TYPE_ENUMERATION,
            self::KEY_PARAM => 'material',
            self::KEY_ACTIVE => true,
            self::KEY_IN_URL => true,
            self::KEY_SHORT_PARAM => 'm',
            self::KEY_URL_POSITION => 2,
            self::KEY_RETURN_ZERO_VALUES => true,
            self::KEY_MULTI_VALUED => true
        ]
    ];

    /**
     * @var array
     */
    protected static $sortNamesMapping = [
        'number_sort_price' => 'price'
    ];

    /**
     * @param $value
     * @return mixed
     */
    public static function priceValueCallbackBefore($value)
    {
        return $value * 100;
    }

    /**
     * @param $value
     * @return mixed
     */
    public static function priceValueCallbackAfter($value)
    {
        return $value / 100;
    }
}
