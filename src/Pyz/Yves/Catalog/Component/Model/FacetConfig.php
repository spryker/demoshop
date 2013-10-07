<?php
namespace Pyz\Yves\Catalog\Component\Model;

/**
 * @package Pyz\Yves\Catalog\Component\Model
 */
class FacetConfig
{
    const KEY_PARAM = 'param';
    const KEY_ACTIVE = 'active';
    const KEY_TYPE = 'type';

    const TYPE_ENUMERATION = 'enumeration';
    const TYPE_CATEGORY = 'category';
    const TYPE_SLIDER = 'slider';
    const TYPE_BOOL = 'bool';

    /**
     * //TODO fill with valid values, e.g. param names, active
     * @var array
     */
    protected static $facets = [
        'int_facet_height' => [
            self::KEY_TYPE => self::TYPE_CATEGORY,
            self::KEY_PARAM => 'cat', //maybe revoke because cat is part of the url
            self::KEY_ACTIVE => true
        ],
        'int_facet_length' => [
            self::KEY_TYPE => self::TYPE_ENUMERATION,
            self::KEY_PARAM => 'length',
            self::KEY_ACTIVE => true
        ],
        'int_facet_width' => [
            self::KEY_TYPE => self::TYPE_ENUMERATION,
            self::KEY_PARAM => 'width',
            self::KEY_ACTIVE => true
        ],
        'string_facet_brand' => [
            self::KEY_TYPE => self::TYPE_ENUMERATION,
            self::KEY_PARAM => 'brand',
            self::KEY_ACTIVE => true
        ],
        'string_facet_color' => [
            self::KEY_TYPE => self::TYPE_ENUMERATION,
            self::KEY_PARAM => 'color',
            self::KEY_ACTIVE => true
        ],
        'string_facet_material' => [
            self::KEY_TYPE => self::TYPE_ENUMERATION,
            self::KEY_PARAM => 'material',
            self::KEY_ACTIVE => true
        ]
    ];

    /**
     * @param $facetName
     * @return string|null
     */
    public static function getParameterNameForFacet($facetName)
    {
        return isset(self::$facets[$facetName]) ? self::$facets[$facetName] : null;
    }

    /**
     * @param $paramName
     * @return string|null
     * @throws \RuntimeException
     */
    public static function getFacetNameFromParameter($paramName)
    {
        $callback = function ($facet) use ($paramName) {
            return self::filterFacetByParamNameCallback($facet, $paramName);
        };
        $facetForParam = array_filter(self::$facets, $callback);
        $keys = array_keys($facetForParam);
        if (count($keys) > 1) {
            throw new \RuntimeException('Parameter names for Facets must be unique, Duplicates found for param: '. $paramName);
        }
        return array_pop($keys);
    }

    /**
     * @return array
     */
    public static function getActiveFacets()
    {
        return array_filter(self::$facets, [__CLASS__, 'filterActiveFacetsCallback']);
    }

    /**
     * @return array
     */
    public static function getAllParamNamesForFacets()
    {
        $paramNames = [];
        foreach (self::$facets as $facet) {
            $paramNames[] = $facet[self::KEY_PARAM];
        }

        return $paramNames;
    }

    /**
     * @param $facet
     * @return mixed
     */
    protected static function filterActiveFacetsCallback($facet)
    {
        return $facet[self::KEY_ACTIVE];
    }

    /**
     * @param $facet
     * @param $paramName
     * @return bool
     */
    protected static function filterFacetByParamNameCallback($facet, $paramName)
    {
        return $facet[self::KEY_PARAM] == $paramName;
    }
}
