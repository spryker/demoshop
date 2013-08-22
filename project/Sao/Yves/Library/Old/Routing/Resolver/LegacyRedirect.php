<?php

/**
 * Class Sao_Yves_Library_Routing_Resolver_LegacyRedirect
 * Hook transparently into existing urls and redirect calls to legacy-module
 *
 * @author Stefan Sorge
 */
class Sao_Yves_Library_Routing_Resolver_LegacyRedirect extends ProjectA_Yves_Library_Routing_Resolver_Abstract
{

    /**
     * @see ProjectA_Yves_Library_Routing_Resolver_Default::$modulePath
     */
    protected $modulePath;

    /**
     * @var array
     */
    protected $inboundHooks;

    /**
     * @see ProjectA_Yves_Library_Routing_Resolver_Default::__construct
     */
    public function __construct()
    {
        $this->modulePath = APPLICATION_PROJECT . DIRECTORY_SEPARATOR . 'Yves' . DIRECTORY_SEPARATOR . 'application'
            . DIRECTORY_SEPARATOR . 'modules';

        $this->inboundHooks
            = array(Sao_Yves_Library_Routing_UrlManager::ROUTE_LOGIN                    => Sao_Yves_Library_Routing_UrlManager::ROUTE_LEGACY_CUSTOMER_LOGIN,
                    Sao_Yves_Library_Routing_UrlManager::ROUTE_CUSTOMER_REGISTER        => Sao_Yves_Library_Routing_UrlManager::ROUTE_LEGACY_CUSTOMER_REGISTER,
                    Sao_Yves_Library_Routing_UrlManager::ROUTE_CUSTOMER_LOGINORREGISTER => Sao_Yves_Library_Routing_UrlManager::ROUTE_LEGACY_CUSTOMER_LOGINORREGISTER,
                    Sao_Yves_Library_Routing_UrlManager::ROUTE_LOGOUT                   => Sao_Yves_Library_Routing_UrlManager::ROUTE_LEGACY_CUSTOMER_LOGOUT,
                    Sao_Yves_Library_Routing_UrlManager::ROUTE_FACEBOOK_POPUP => Sao_Yves_Library_Routing_UrlManager::ROUTE_LEGACY_FACEBOOK_POPUP,
            Sao_Yves_Library_Routing_UrlManager::ROUTE_CUSTOMER_FACEBOOKLOGIN => Sao_Yves_Library_Routing_UrlManager::ROUTE_LEGACY_CUSTOMER_FACEBOOKLOGIN
        );

        // Dev!

        $this->inboundHooks = array_merge(
            $this->inboundHooks,
            array(
                 'customer/index/mockLegacySession' => 'legacy/customer/mockLegacySession',
                 'customer/catalog/sandbox'         => 'catalog/sandbox',
            )
        );
    }


    /**
     * No url-creation necessary
     *
     * @see CBaseUrlRule::createUrl()
     */
    public function createUrl($manager, $route, $params, $ampersand)
    {
        return false;
    }

    /**
     * @see CBaseUrlRule::parseUrl()
     */
    public function parseUrl($manager, $request, $pathInfo, $rawPathInfo)
    {
        $pathInfo = $this->getRouteIfExisting($pathInfo);

        if (!isset($this->inboundHooks[$pathInfo])) {
            return false;
        }

        return $this->inboundHooks[$pathInfo];
    }

    /**
     * Fork from ProjectA_Yves_Library_Routing_Resolver_Default
     *
     * @see ProjectA_Yves_Library_Routing_Resolver_Default::getRouteIfExisting
     */
    protected function getRouteIfExisting($pathInfo)
    {
        $pathElements = explode('/', $pathInfo);
        if (!isset($pathElements[1])) {
            $pathElements[1] = $pathElements[2] = 'index';
        } elseif (!isset($pathElements[2])) {
            $pathElements[2] = 'index';
        }

        list($module, $controller, $action) = $pathElements;
        unset($pathElements);
        $path = $this->modulePath . DIRECTORY_SEPARATOR . $module . DIRECTORY_SEPARATOR;

        // Does the module exist
        if (!is_dir($path)) {
            return false;
        }

        $fileName = ucfirst($controller) . 'Controller.php';
// Enable "virtual" routes
//        // Does the controller exist
//        if (!is_file($path . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . $fileName)) {
//            return false;
//        }
        return $module . '/' . $controller . '/' . $action;
    }
}
