<?php

namespace Pyz\Yves\Catalog\Business\Model;
use ProjectA\Yves\Catalog\Business\Model\FacetConfig as CoreFacetConfig;

/**
 * @package Pyz\Yves\Catalog\Business\Model
 */
class FacetConfig extends CoreFacetConfig
{
    /**
     * //TODO fill with valid values, e.g. param names, active
     * @var array
     */
    protected static $attributes = [
//        'price' => [
//            self::KEY_FACET_FIELD_NAME => self::FIELD_FLOAT_FACET,
//            self::KEY_SORT_FIELD_NAME => self::FIELD_NUMBER_SORT,
//            self::KEY_TYPE => self::TYPE_SLIDER,
//            self::KEY_PARAM => 'price',
//            self::KEY_FACET_ACTIVE => false,
//            self::KEY_SORT_ACTIVE => false,
//            self::KEY_RANGE_DIVIDER => '-',
//            self::KEY_VALUE_CALLBACK_BEFORE => [__CLASS__, 'priceValueCallbackBefore'],
//            self::KEY_VALUE_CALLBACK_AFTER => [__CLASS__, 'priceValueCallbackAfter']
//        ],
//        'category' => [
//            self::KEY_FACET_FIELD_NAME => 'category',
//            self::KEY_TYPE => self::TYPE_CATEGORY,
//            self::KEY_PARAM => 'category',
//            self::KEY_FACET_ACTIVE => false,
//            self::KEY_SORT_ACTIVE => false,
//            self::KEY_IN_URL => true,
//            self::KEY_SHORT_PARAM => 'c',
//            self::KEY_URL_POSITION => 0
//        ],
//        'manufacturer' => [
//            self::KEY_FACET_FIELD_NAME => self::FIELD_STRING_FACET,
//            self::KEY_TYPE => self::TYPE_ENUMERATION,
//            self::KEY_PARAM => 'manufacturer', //maybe revoke because cat is part of the url
//            self::KEY_FACET_ACTIVE => false,
//            self::KEY_SORT_ACTIVE => false,
//        ],
//        'length' => [
//            self::KEY_FACET_FIELD_NAME => self::FIELD_NUMBER_FACET,
//            self::KEY_TYPE => self::TYPE_SLIDER,
//            self::KEY_PARAM => 'length',
//            self::KEY_RANGE_DIVIDER => '-',
//            self::KEY_FACET_ACTIVE => false,
//            self::KEY_SORT_ACTIVE => false,
//        ],
//        'width' => [
//            self::KEY_FACET_FIELD_NAME => self::FIELD_NUMBER_FACET,
//            self::KEY_TYPE => self::TYPE_ENUMERATION,
//            self::KEY_PARAM => 'width',
//            self::KEY_FACET_ACTIVE => false,
//            self::KEY_SORT_ACTIVE => false,
//        ],
//        'brand' => [
//            self::KEY_FACET_FIELD_NAME => self::FIELD_STRING_FACET,
//            self::KEY_TYPE => self::TYPE_ENUMERATION,
//            self::KEY_PARAM => 'brand',
//            self::KEY_FACET_ACTIVE => false,
//            self::KEY_SORT_ACTIVE => false,
//            self::KEY_IN_URL => true,
//            self::KEY_SHORT_PARAM => 'b',
//            self::KEY_URL_POSITION => 1,
//            self::KEY_MULTI_VALUED => true,
//        ],
        'main_color' => [
            self::KEY_FACET_FIELD_NAME => self::FIELD_STRING_FACET,
            self::KEY_TYPE => self::TYPE_ENUMERATION,
            self::KEY_PARAM => 'main_color',
            self::KEY_FACET_ACTIVE => true,
            self::KEY_SORT_ACTIVE => false,
            self::KEY_MULTI_VALUED => false,
        ],
        'material' => [
            self::KEY_FACET_FIELD_NAME => self::FIELD_STRING_FACET,
            self::KEY_TYPE => self::TYPE_ENUMERATION,
            self::KEY_PARAM => 'material',
            self::KEY_FACET_ACTIVE => true,
            self::KEY_SORT_ACTIVE => false,
            self::KEY_MULTI_VALUED => true,
//            self::KEY_IN_URL => true,
//            self::KEY_SHORT_PARAM => 'm',
//            self::KEY_URL_POSITION => 2,
//            self::KEY_RETURN_ZERO_VALUES => true,
        ],
        'name' => [
            self::KEY_SORT_ACTIVE => false,
            self::KEY_SORT_FIELD_NAME => self::FIELD_STRING_SORT,
            self::KEY_FACET_ACTIVE => false,
            self::KEY_PARAM => 'name',
        ],
        'price' => [
            self::KEY_FACET_ACTIVE => true,
            self::KEY_SORT_ACTIVE => true,
            self::KEY_FACET_FIELD_NAME => self::FIELD_INTEGER_FACET,
            self::KEY_SORT_FIELD_NAME => self::FIELD_INTEGER_SORT,
            self::KEY_TYPE => self::TYPE_SLIDER,
            self::KEY_PARAM => 'price',
            self::KEY_RANGE_DIVIDER => '-',
            self::KEY_VALUE_CALLBACK_BEFORE => [__CLASS__, 'priceValueCallbackBefore'],
            self::KEY_VALUE_CALLBACK_AFTER => [__CLASS__, 'priceValueCallbackAfter']
//            self::KEY_IN_URL => true,
//            self::KEY_URL_POSITION => 0,
        ],
        'age' => [
            self::KEY_FACET_ACTIVE => true,
            self::KEY_SORT_ACTIVE => false,
            self::KEY_FACET_FIELD_NAME => self::FIELD_INTEGER_FACET,
            self::KEY_TYPE => self::TYPE_ENUMERATION,
            self::KEY_PARAM => 'age',
//            self::KEY_IN_URL => true,
//            self::KEY_URL_POSITION => 1,
        ],
    ];

    /**
     * @var array
     */
    protected static $stringFacetFields = [
        self::FIELD_STRING_FACET,
    ];

    /**
     * @var array
     */
    protected static $numericFacetFields = [
        self::FIELD_FLOAT_FACET,
        self::FIELD_INTEGER_FACET,
    ];

    /**
     * @var array
     */
    protected static $sortNamesMapping = [ 'name' ];

    /**
     *
     * @param int $value
     * @return mixed
     */
    public static function priceValueCallbackBefore($value)
    {
        return $value * 100;
    }

    /**
     * @param int $value
     * @return mixed
     */
    public static function priceValueCallbackAfter($value)
    {
        return $value / 100;
    }
}