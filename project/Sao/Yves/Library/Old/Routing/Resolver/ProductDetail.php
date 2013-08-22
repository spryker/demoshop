<?php
class Sao_Yves_Library_Routing_Resolver_ProductDetail extends ProjectA_Yves_Library_Routing_Resolver_Abstract
{

    /**
     * @see CBaseUrlRule::createUrl()
     */
    public function createUrl ($manager, $route, $params, $ampersand)
    {
        if ($route == Sao_Yves_Library_Routing_UrlManager::ROUTE_CATALOG_DETAIL) {
            $product = (isset($params['product'])) ? $params['product'] : null;
            if ($product) {
                return $product->getUrl();
            }
        }
        return false;
    }

    /**
     * @see CBaseUrlRule::parseUrl()
     */
    public function parseUrl ($manager, $request, $pathInfo, $rawPathInfo)
    {
        if (substr($pathInfo, -5) !== '.html') {
            return false;
        }

        $this->setActionParam('urlkey', $pathInfo);

        return Sao_Yves_Library_Routing_UrlManager::ROUTE_CATALOG_DETAIL;
    }
}