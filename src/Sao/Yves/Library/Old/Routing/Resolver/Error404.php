<?php
class Sao_Yves_Library_Routing_Resolver_Error404 extends ProjectA_Yves_Library_Routing_Resolver_Abstract
{

    /**
     * @see CBaseUrlRule::createUrl()
     */
    public function createUrl ($manager, $route, $params, $ampersand)
    {
        if ($route == Sao_Yves_Library_Routing_UrlManager::ROUTE_ERROR_404) {
            return Sao_Yves_Library_Routing_UrlManager::ROUTE_ERROR_404;
        }
        return false;
    }

    /**
     * @see CBaseUrlRule::parseUrl()
     */
    public function parseUrl ($manager, $request, $pathInfo, $rawPathInfo)
    {
        return Sao_Yves_Library_Routing_UrlManager::ROUTE_ERROR_404;
    }
}
