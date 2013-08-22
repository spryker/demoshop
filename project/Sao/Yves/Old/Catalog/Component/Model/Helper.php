<?php
/**
 *
 */
class Sao_Yves_Catalog_Component_Model_Helper
{
    /**
     *
     */
    const CATALOG_URL = 'LAST_CATALOG_URL';

    /**
     *
     */
    const LIMIT_SPECIALPRICE_DISPLAY = 4;

    /**
     * @static
     * @param $facets
     * @param $search
     * @return string
     */
    public static function getTitle($facets, $search)
    {
        $title = '';

        if (!empty($search)) {
            $title .= $search;
        } else {
            if (!empty($facets)) {
                $urlFacets = Sao_Yves_Catalog_Component_Model_Facets::getUrlFacets();
                foreach ($facets as $k => $v) {
                    if (isset($urlFacets[$k])) {
                        $title .= t($v) . ', ';
                    }
                }
            }

            $title = rtrim(trim($title), ',');
        }

        return $title;
    }


    /**
     * @static
     * @param array $params
     * @param bool $replaceKey
     * @param bool $replaceValue
     * @return mixed|string
     */
    public static function getUrl($params = array(), $replaceKey = false, $replaceValue = false)
    {

        //category set?
        if ($replaceKey == Sao_Yves_Catalog_Component_Model_Catalog::PARAM_CATEGORY && $replaceValue) {
            $url = '/' . $replaceValue;
            $replaceKey = false;

        } else {
            if (isset($params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_CATEGORY])) {
                $categoryId = $params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_CATEGORY];
                $category = Generated_Yves_ModelFactory::getYpCategoryModelCategory(Sao_Yves_Application_Component_Model_Factory::getStorage())->getCategory($categoryId);
                $url = '/' . $category['url'];
            } else {
                $url = '/catalog';
            }
        }

        if (isset($params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_CATEGORY])) {
            unset($params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_CATEGORY]);
        }

        $url = Sao_Yves_Library_Base_Helper::getUrl($url, $params, $replaceKey, $replaceValue);
        return $url;
    }


    /**
     * @param $params
     * @return array
     */
    public static function removeFilters($params, $removeCategory = true)
    {
        $urlParams = array();
        isset($params[Sao_Yves_Library_Base_Helper::PARAM_ITEMS_PER_PAGE]) ? $urlParams[Sao_Yves_Library_Base_Helper::PARAM_ITEMS_PER_PAGE] = $params[Sao_Yves_Library_Base_Helper::PARAM_ITEMS_PER_PAGE] : null;
        isset($params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_SORT]) ? $urlParams[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_SORT] = $params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_SORT] : null;
        isset($params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_SORT_ORDER]) ? $urlParams[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_SORT_ORDER] = $params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_SORT_ORDER] : null;
        isset($params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_CATEGORY]) && !$removeCategory ? $urlParams[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_CATEGORY] = $params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_CATEGORY] : null;
        return $urlParams;
    }

    /**
     * @param array $params
     * @return bool
     */
    public static function issetFilter(array $params)
    {
        //remove all non filter params
        if (isset($params[Sao_Yves_Library_Base_Helper::PARAM_ITEMS_PER_PAGE])) {
            unset ($params[Sao_Yves_Library_Base_Helper::PARAM_ITEMS_PER_PAGE]);
        }
        if (isset($params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_SORT])) {
            unset ($params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_SORT]);
        }
        if (isset($params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_SORT_ORDER])) {
            unset ($params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_SORT_ORDER]);
        }
        if (isset($params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_CATEGORY])) {
            unset ($params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_CATEGORY]);
        }
        if (isset($params[Sao_Yves_Library_Base_Helper::PARAM_PAGE])) {
            unset ($params[Sao_Yves_Library_Base_Helper::PARAM_PAGE]);
        }

        return !empty($params);
    }

    /**
     * @static
     * @param array $product
     * @return bool
     */
    public static function isSpecialPrice(array $product)
    {
        if (($specialPrice = self::calculateSpecialPricePercentage($product)) && $specialPrice >= self::LIMIT_SPECIALPRICE_DISPLAY) {
            return true;
        }

        return false;
    }

    /**
     * @static
     * @param array $product
     * @return float|int
     */
    public static function getSpecialPricePercentage(array $product)
    {
        if (self::isSpecialPrice($product)) {
            if (($specialPrice = self::calculateSpecialPricePercentage($product)) && $specialPrice >= self::LIMIT_SPECIALPRICE_DISPLAY) {
                return $specialPrice;
            }
        }
        return 0;
    }

    /**
     * @param array $product
     *
     * @return int
     */
    public static function calculateSpecialPricePercentage(array $product)
    {
        if (!isset($product['recommended_retail_price']) || !$product['recommended_retail_price']) {
            return 0;
        }
        return 100 - $product['price'] / $product['recommended_retail_price'] * 100;
    }

    /**
     * @static
     * @param array $product
     * @return bool
     */
    public static function isBio(array $product)
    {
        if (isset($product['attributes']['icon_bio']) && $product['attributes']['icon_bio'] == true) {
            return true;
        }
        return false;
    }

    /**
     * @static
     * @param array $product
     * @return bool
     */
    public static function isPharmacy(array $product)
    {
        if (isset($product['attributes']['pharmacy']) && $product['attributes']['pharmacy'] == true) {
            return true;
        }
        return false;

    }

    /**
     * Builds the tabs for a product detail
     * @param array $product
     * @return array
     */
    public static function getTabs(array $product, Sao_Yves_Library_Base_Controller $controller)
    {
        $tabs = array();
        $manufacturer = null;

        //Product description
        if (isset($product['attributes']['description']) && $product['attributes']['description']) {
            $tabs[] = array('description', t(Sao_Yves_Library_L::DESCRIPTION), self::getTabDescription($product));
        }

        //Manufacturer Description
        if (isset($product['attributes']['manufacturer_description']) && $product['attributes']['manufacturer_description']) {
            $manufacturer = $product['attributes']['manufacturer_description'];
            unset($product['attributes']['manufacturer_description']);
        }

        //Reviews
        //$tabs[] = array('reviews', t(L::REVIEWS), self::getTabReviews($product['sku'], $controller));

        //List product attributes aka Details
        if (isset($product['attributes']) && $product['attributes']) {
            $tabs[] = array('attributes', t(Sao_Yves_Library_L::DETAILS_FOR_PRODUCT), self::getTabAttributes($product, $controller));
        }

        if ($manufacturer) {
            $tabs[] = array('manufacturer', t(Sao_Yves_Library_L::MANUFACTURER_DESCRIPTION), $manufacturer);
        }

        $categoryHelper = Sao_Yves_Category_Component_Model_Helper::getInstance();
        $tabs[] = array('categories', t(Sao_Yves_Library_L::CATEGORIES_FOR_PRODUCT), $controller->renderPartial('catalog/index/partials/product-categories', array('categories' => $categoryHelper->getCategoriesForProductTab($product['categories']), 'title' => t(Sao_Yves_Library_L::PRODUCT_CATEGORIES_TITLE)), true));

        return $tabs;
    }

    public static function getBackLink(array $product) {
        $categoryHelper = Sao_Yves_Category_Component_Model_Helper::getInstance();
        return $categoryHelper->getCategoryBackLinkForBrand($product['categories'], $product['brand']);
    }

    /**
     * @param $facets
     * @param $request
     * @param $allParams
     * @return array
     */
    public static function getActiveFilters($facets, $allFacets, $request, $allParams)
    {
        unset($facets['category']);

        $activeFilters = array();

        $paramsWithoutBools = $allParams;

        $key = null;
        $value = null;
        $otherValues = null;
        $url = null;

        foreach ($facets as $facetTypeName => $facetType) {
            foreach ($facetType as $facetName => $facet) {

                $param = $request->getParam($facet['facet']['param']);
                if ($param) {

                    switch ($facetTypeName) {

                        case 'bool':
                            $key = Sao_Yves_Library_L::FILTERS_OPTIONS;
                            $value = t($facet['facet']['label']);
                            unset($paramsWithoutBools[$facet['facet']['param']]);
                            $url = Sao_Yves_Catalog_Component_Model_Helper::getUrl($paramsWithoutBools);
                            break;

                        case 'slider':
                            $key = Sao_Yves_Library_L::PRICE;
                            $prices = explode('-', $param);
                            $value = ($prices[0] / 100) . ' - ' . ($prices[1] / 100) . ' '.ProjectA_Shared_Library_Currency::getCurrency()->getFrontendSymbol();
                            $url = Sao_Yves_Catalog_Component_Model_Helper::getUrl($allParams, $facet['facet']['param']);
                            break;

                        default:
                            $key = $facet['facet']['param'];
                            $value = $param;
                            $otherValues = $allFacets[$facetTypeName][$facetName]['values'];
                            $url = Sao_Yves_Catalog_Component_Model_Helper::getUrl($allParams, $facet['facet']['param']);
                            break;
                    }

                    if (!isset($activeFilters[$key])) {
                        $activeFilters[$key] = array('value' => $value);
                    } else {
                        $activeFilters[$key]['value'] .= ', ' . $value;
                    }

                    $activeFilters[$key]['otherValues'] = $otherValues;
                    $activeFilters[$key]['url'] = $url;
                }
            }
        }
        $param = $request->getParam(Sao_Yves_Catalog_Component_Model_Catalog::PARAM_SEARCH);
        if ($param) {
            $key = Sao_Yves_Library_L::SEARCH;
            $value = $param;
            $url = Sao_Yves_Catalog_Component_Model_Helper::getUrl($allParams, Sao_Yves_Catalog_Component_Model_Catalog::PARAM_SEARCH);

            $activeFilters[$key] = array('value' => $value, 'url' => $url, 'otherValues' => null);
        }
        return $activeFilters;
    }

    /**
     * @param array $attributes
     * @return array
     */
    public static function getRecensions(array $attributes)
    {

        $recensions = array(
            '1' => (int)$attributes['rating_one_star'],
            '2' => (int)$attributes['rating_two_stars'],
            '3' => (int)$attributes['rating_three_stars'],
            '4' => (int)$attributes['rating_four_stars'],
            '5' => (int)$attributes['rating_five_stars'],
            'rating' => (float)$attributes['rating'],
            'total' => 0,
            'count' => 0,
            'text_reviews' => (int)$attributes['text_review_amount']
        );
        for ($i = 1; $i <= 5; $i++) {
            $recensions['total'] += $recensions[$i];
}
        $recensions['count'] = $recensions['total'] + $recensions['text_reviews'];

        return $recensions;
    }

    /**
     * Formats amount and measure unit according to product's attributes
     * @static
     * @param array $product
     * @return string
     */
    public static function getMeasureAmount(array $product) {
        $attr = $product['attributes'];
        if (isset($attr['amount_in_package'], $attr['pharmaceutical_form'], $attr['measure_unit'], $attr['measure'])
            && !empty($attr['amount_in_package']) && !empty($attr['pharmaceutical_form']) && !empty($attr['measure_unit']) && !empty($attr['measure'])) {
            if (in_array(mb_strtolower($attr['pharmaceutical_form'], 'UTF-8'), array('barras', 'barra', 'sachês', 'balas'))) {
                return $attr['amount_in_package'].' x '.$attr['measure'].$attr['measure_unit'];
            } else {
                return $attr['amount_in_package'].' '.$attr['pharmaceutical_form'].', '.$attr['measure'].$attr['measure_unit'];
            }
        } elseif (isset($attr['amount_in_package'], $attr['pharmaceutical_form'])
            && !empty($attr['amount_in_package']) && !empty($attr['pharmaceutical_form'])) {
            return $attr['amount_in_package'].' '.$attr['pharmaceutical_form'];
        } elseif (isset($attr['measure_unit'], $attr['measure']) && !empty($attr['measure_unit']) && !empty($attr['measure'])) {
            return $attr['measure'].$attr['measure_unit'];
        }
        return '';
    }

    /**
     * @param $product
     * @param Sao_Yves_Library_Base_Controller $controller
     * @return mixed|string
     */
    private static function getTabAttributes($product, Sao_Yves_Library_Base_Controller $controller)
    {
        throw new Exception('Refactor this code');

        switch ($product['attribute_set']) {
            case Nu3Shared_Catalog_Interface_ProductAttributeSetConstant::ATTRIBUTESET_COSMETICS:
                $attributes = self::getTabAttributesCosmetics($product['attributes']);
                break;
            case Nu3Shared_Catalog_Interface_ProductAttributeSetConstant::ATTRIBUTESET_OTHER:
            default:
                $attributes = self::getTabAttributesOther($product['attributes']);
        }

        //foreach ($product['attributes'] as $name => $attribute) {
        //    if (preg_match("/^icon_.*/", $name)) {
        //        $attributes[$name] = $attribute;
        //    }
        //}

        return $controller->renderPartial(
            'catalog/index/partials/product-attributes',
            array(
                'attributes' => $attributes,
                'title' => $product['name'],
                'sku' => $product['sku'],
                'ingredients' => isset($product['attributes']['ingredients_table']) ? $product['attributes']['ingredients_table'] : null,
                'barcode' => isset($product['attributes']['barcode']) ? $product['attributes']['barcode'] : null,
                'sku' => isset($product['sku']) ? $product['sku'] : null,
            ),
            true
        );
    }

    /**
     * @param array $productAttributes
     * @return array
     */
    protected static function getTabAttributesCosmetics(array $productAttributes)
    {
        $attributes = array();
        $attributes = self::addAttribute($attributes, $productAttributes, 'hair_type');
        $attributes = self::addAttribute($attributes, $productAttributes, 'skin_type');
        $attributes = self::addAttribute($attributes, $productAttributes, 'paraben_free');
        $attributes = self::addAttribute($attributes, $productAttributes, 'sulfates_free');
        $attributes = self::addAttribute($attributes, $productAttributes, 'petrol_chemical_free');
        $attributes = self::addAttribute($attributes, $productAttributes, 'fragrance_free', true);
        $attributes = self::addAttribute($attributes, $productAttributes, 'organic');
        $attributes = self::addAttribute($attributes, $productAttributes, 'natural_ingredients');
        $attributes = self::addAttribute($attributes, $productAttributes, 'cruelty_free');
        $attributes = self::addAttribute($attributes, $productAttributes, 'vegan', true);
        $attributes = self::addAttribute($attributes, $productAttributes, 'expiration');
        $attributes = self::addAttribute($attributes, $productAttributes, 'anvisa');
        $attributes = self::addAttribute($attributes, $productAttributes, 'ms');
        return $attributes;
    }

    /**
     * @param array $productAttributes
     * @return array
     */
    protected static function getTabAttributesOther(array $productAttributes)
    {
        $attributes = array();
        $attributes = self::addAttribute($attributes, $productAttributes, 'flavoring_free', true);
        $attributes = self::addAttribute($attributes, $productAttributes, 'preservative_free', true);
        $attributes = self::addAttribute($attributes, $productAttributes, 'coloring_free', true);
        $attributes = self::addAttribute($attributes, $productAttributes, 'artificial_sweetner_free', true);
        $attributes = self::addAttribute($attributes, $productAttributes, 'sugar_free', true);
        $attributes = self::addAttribute($attributes, $productAttributes, 'gluten_free', true);
        $attributes = self::addAttribute($attributes, $productAttributes, 'lactose_free', true);
        $attributes = self::addAttribute($attributes, $productAttributes, 'vegan', true);
        $attributes = self::addAttribute($attributes, $productAttributes, 'vegetarien', true);
        $attributes = self::addAttribute($attributes, $productAttributes, 'organic', true);
        $attributes = self::addAttribute($attributes, $productAttributes, 'kosher', true);
        $attributes = self::addAttribute($attributes, $productAttributes, 'natural_ingredients', true);
        $attributes = self::addAttribute($attributes, $productAttributes, 'expiration');
        $attributes = self::addAttribute($attributes, $productAttributes, 'anvisa');
        $attributes = self::addAttribute($attributes, $productAttributes, 'ms');
        return $attributes;
    }


    /**
     * @param array $attributes
     * @param array $productAttributes
     * @param string $attributeName
     * @param bool $showNegativeValue
     * @return array
     */
    protected static function addAttribute($attributes, $productAttributes, $attributeName, $showNegativeValue = false)
    {
        if (!isset($productAttributes[$attributeName])) {
            return $attributes;
        }
        if (!$showNegativeValue && !$productAttributes[$attributeName]) {
            return $attributes;
        }
        $attributes[$attributeName] = $productAttributes[$attributeName];
        return $attributes;
    }


    /**
     * @param $product
     * @return string
     */
    private static function getTabDescription($product)
    {
        $description = '';
        if (isset($product['attributes']['description'])) {
            $description .= $product['attributes']['description'];
            unset($product['attributes']['description']);
        }

        if (isset($product['attributes']['ingredients'])) {
            $description .= $product['attributes']['ingredients'];
            unset($product['attributes']['ingredients']);
        }

        return $description;
    }

    /**
     * Localized preprocessing to filter and decorate attributes
     *
     * @param array $attributes
     * @return array
     */
    protected static function preprocessAttributes($attributes)
    {
        if (!empty($attributes) && !empty(self::$attributeRules)) {
            foreach (self::$attributeRules as $attribute => $rules) {
                if (isset($attributes[$attribute])) {

                    foreach ($rules as $rule) {
                        switch ($rule['action']) {
                        case 'round':
                            $attributes[$attribute] = round($attributes[$attribute], $rule['precision']);
                            break;
                        case 'merge':
                            $attributes[$attribute] = $attributes[$attribute] . ' ' . $attributes[$rule['with']];
                            unset($attributes[$rule['with']]);
                            break;
                        }
                    }
                }
            }
        }
        return $attributes;
    }


    /**
     * Preprocessing steps for attributes
     * @var array $attributeRules
     */
    protected static $attributeRules = array(
        'weight' => array(
            array('action' => 'round', 'precision' => 2),
            array('action' => 'merge', 'with' => 'weight_unit')
        ),
        'amount' => array(
            array('action' => 'merge', 'with' => 'unit')
        ),
    );

    /**
     * Returns the selected value of a facet
     * @param array $facet
     * @param array $params
     * @return string
     */
    protected static function getValue($facet, &$params)
    {
        $v = ProjectA_Shared_Library_Storage::getUrlKey(t($params[$facet['name']]));
        unset($params[$facet['name']]);
        return $v;
    }

    /**
     * Transform numeric values to their urlkey pendant
     * @param unknown_type $value
     */
    protected static function getNumeric($value)
    {
        //float - decimal 0
        if (strstr($value, '.0')) {
            return round($value, 0);
        }

        return $value;
    }

    /**
     * Returns current sort based on parameters
     * @param array $params
     * @return string
     */
    public static function getCurrentSort($params) {
        if (isset($params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_SORT]) && !empty($params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_SORT]) && $params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_SORT] != 'score')
            return $params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_SORT];
        if (isset($params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_SEARCH]) && strlen(trim($params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_SEARCH])))
            return 'score';
        return 'relevance';
    }

    /**
     * Returns current sort order based on parameters
     * @param array $params
     * @return string
     */
    public static function getCurrentSortOrder($params) {
        if (isset($params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_SORT_ORDER]) && in_array($params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_SORT_ORDER], ['asc', 'desc']))
            return $params[Sao_Yves_Catalog_Component_Model_Catalog::PARAM_SORT_ORDER];
        $sort = static::getCurrentSort($params);
        return (in_array($sort, ['score', 'relevance']) ? 'desc' : 'asc');
    }

    /**
     * Based on parameters determines if first results row should be highlighted
     * @param array $params
     * @return bool
     */
    public static function isHighlightFirstRow($params) {
        $sort = static::getCurrentSort($params);
        $order = static::getCurrentSortOrder($params);
        return ($sort == 'relevance' && $order == 'desc' && (!isset($params[Sao_Yves_Library_Base_Helper::PARAM_PAGE]) || $params[Sao_Yves_Library_Base_Helper::PARAM_PAGE] == 1) ? true : false);
    }
}
