<?php
class Sao_Yves_Library_Routing_Resolver_ProductSeo extends ProjectA_Yves_Library_Routing_Resolver_Abstract
{
    const SEO_LINK_CATEGORY_LIST = 'catalog/seo_sitemap/category';
    const SEO_LINK_PRODUCT_LIST = 'catalog/seo_sitemap/product';

    protected $seoController = array(
         self::SEO_LINK_CATEGORY_LIST => Sao_Yves_Library_Routing_UrlManager::ROUTE_CATALOG_SEO_CATEGORY,
         self::SEO_LINK_PRODUCT_LIST => Sao_Yves_Library_Routing_UrlManager::ROUTE_CATALOG_SEO_PRODUCT,
    );

    /**
     * @see CBaseUrlRule::createUrl()
     */
    public function createUrl ($manager, $route, $params, $ampersand)
    {
        if ($route == Sao_Yves_Library_Routing_UrlManager::ROUTE_CATALOG) {
            $url = Sao_Yves_Catalog_Component_Model_Helper::getUrl($params, true);
            return $url;
        }
        return false;
    }

    /**
     * @see CBaseUrlRule::parseUrl()
     */
    public function parseUrl ($manager, $request, $pathInfo, $rawPathInfo)
    {
        foreach ($this->seoController as $url => $route) {
            if (strcmp($url, $pathInfo) == 0) {
                return $route;
            }
        }

        return false;
    }

}
