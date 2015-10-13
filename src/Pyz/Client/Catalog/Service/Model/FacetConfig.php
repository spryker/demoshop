<?php

namespace Pyz\Client\Catalog\Service\Model;

use SprykerFeature\Client\Catalog\Service\Model\FacetConfig as CoreFacetConfig;

class FacetConfig extends CoreFacetConfig
{

    /**
     * @var array
     */
    protected static $attributes = [
        'delivery_time' => [
            self::KEY_FACET_FIELD_NAME => self::FIELD_STRING_FACET,
            self::KEY_TYPE => self::TYPE_ENUMERATION,
            self::KEY_PARAM => 'delivery_time',
            self::KEY_FACET_ACTIVE => true,
            self::KEY_SORT_ACTIVE => false,
            self::KEY_MULTI_VALUED => false,
        ],
        'weight' => [
            self::KEY_FACET_FIELD_NAME => self::FIELD_STRING_FACET,
            self::KEY_TYPE => self::TYPE_ENUMERATION,
            self::KEY_PARAM => 'weight',
            self::KEY_FACET_ACTIVE => true,
            self::KEY_SORT_ACTIVE => false,
            self::KEY_MULTI_VALUED => false,
        ],
        'price' => [
            self::KEY_FACET_ACTIVE => true,
            self::KEY_SORT_ACTIVE => true,
            self::KEY_FACET_FIELD_NAME => self::FIELD_INTEGER_FACET,
            self::KEY_SORT_FIELD_NAME => self::FIELD_INTEGER_SORT,
            self::KEY_TYPE => self::TYPE_SLIDER,
            self::KEY_PARAM => 'price',
            self::KEY_RANGE_DIVIDER => '-',
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
    protected static $sortNamesMapping = ['name'];

    /**
     * @param int $value
     *
     * @return mixed
     */
    public static function priceValueCallbackBefore($value)
    {
        return $value * 100;
    }

    /**
     * @param int $value
     *
     * @return mixed
     */
    public static function priceValueCallbackAfter($value)
    {
        return $value / 100;
    }

}
