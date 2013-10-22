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
    const KEY_IN_URL = 'in_url';
    const KEY_SHORT_PARAM = 'short_param';
    const KEY_URL_POSITION = 'key_url_position';

    const TYPE_ENUMERATION = 'enumeration';
    const TYPE_CATEGORY = 'category';
    const TYPE_SLIDER = 'slider';
    const TYPE_BOOL = 'bool';

    /**
     * //TODO fill with valid values, e.g. param names, active
     * @var array
     */
    protected static $facets = [
        'int_facet_category' => [
            //self::KEY_TYPE => self::TYPE_ENUMERATION,
            self::KEY_PARAM => 'category',
            self::KEY_ACTIVE => true,
            self::KEY_IN_URL => true,
            self::KEY_SHORT_PARAM => 'c',
            self::KEY_URL_POSITION => 0
        ],
        'int_facet_height' => [
            self::KEY_TYPE => self::TYPE_CATEGORY,
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
            self::KEY_URL_POSITION => 2
        ],
        'string_facet_color' => [
            self::KEY_TYPE => self::TYPE_ENUMERATION,
            self::KEY_PARAM => 'color',
            self::KEY_ACTIVE => true
        ],
        'string_facet_material' => [
            self::KEY_TYPE => self::TYPE_ENUMERATION,
            self::KEY_PARAM => 'material',
            self::KEY_ACTIVE => true,
            self::KEY_IN_URL => true,
            self::KEY_SHORT_PARAM => 'm',
            self::KEY_URL_POSITION => 1
        ]

        //TODO add price and category
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
     * @param $shortParamName
     * @return string|null
     * @throws \RuntimeException
     */
    public static function getFacetNameFromShortParameter($shortParamName)
    {
        $callback = function ($facet) use ($shortParamName) {
            return self::filterFacetByShortParamNameCallback($facet, $shortParamName);
        };
        $facetForParam = array_filter(self::$facets, $callback);
        $keys = array_keys($facetForParam);
        if (count($keys) > 1) {
            throw new \RuntimeException('Short Parameter names for Facets must be unique, Duplicates found for short param: '. $shortParamName);
        }
        return array_pop($keys);
    }

    /**
     * @param $shortParamName
     * @return string|null
     * @throws \RuntimeException
     */
    public static function getParameterNameForShortParameter($shortParamName)
    {
        $callback = function ($facet) use ($shortParamName) {
            return self::filterFacetByShortParamNameCallback($facet, $shortParamName);
        };
        $facetForParam = array_filter(self::$facets, $callback);
        $keys = array_keys($facetForParam);
        if (count($keys) > 1) {
            throw new \RuntimeException('Short Parameter names for Facets must be unique, Duplicates found for short param: '. $shortParamName);
        }

        $facetSetup= array_pop($facetForParam);
        return $facetSetup[self::KEY_PARAM];
    }

    /**
     * @return array
     */
    public static function getActiveFacets()
    {
        return array_filter(self::$facets, [__CLASS__, 'filterActiveFacetsCallback']);
    }

    /**
     * @param bool $onlyActive
     * @return array
     */
    public static function getAllParamNamesForFacets($onlyActive = false)
    {
        $paramNames = [];
        foreach (self::$facets as $facet) {
            if ($onlyActive) {
                if ($facet[self::KEY_ACTIVE] === true) {
                    $paramNames[] = $facet[self::KEY_PARAM];
                }
            } else {
                $paramNames[] = $facet[self::KEY_PARAM];
            }
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

    /**
     * @param $facet
     * @param $shortParamName
     * @return bool
     */
    protected static function filterFacetByShortParamNameCallback($facet, $shortParamName)
    {
        return isset($facet[self::KEY_SHORT_PARAM]) && $facet[self::KEY_SHORT_PARAM] == $shortParamName;
    }
}
