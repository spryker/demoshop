<?php

class Sao_Yves_Library_Routing_Resolver_Cms_Redirection extends ProjectA_Yves_Library_Routing_Resolver_Abstract
{
    /**
     * @see CBaseUrlRule::createUrl()
     */
    public function createUrl($manager, $route, $params, $ampersand)
    {
        if ($route === Sao_Yves_Library_Routing_UrlManager::ROUTE_CMS_REDIRECTION_VIEW && isset($params['cms_redirection_key'])) {
//            $key = Sao_Shared_Library_Storage::getTranslationSingleKey(
//                'cms', preg_replace('~^(?:TEXT|URL|TITLE)_~i', '', $params['cms_redirection_key'])
//            );
            $key = $params['cms_redirection_key'];
            $data = Sao_Yves_Application_Component_Model_Factory::getStorage()->get(ProjectA_Shared_Library_Storage::getCmsRedirectionUrlKey($key));
            if (empty($data) || !isset($data['url_source'])) {
                return false;
            }
            return $data['url_source'];
        }
        return false;
    }

    /**
     * @see CBaseUrlRule::parseUrl()
     */
    public function parseUrl($manager, $request, $pathInfo, $rawPathInfo)
    {
        $key = Sao_Shared_Library_Storage::getCmsRedirectionUrlKey('/' . $pathInfo);
        $value = Sao_Yves_Application_Component_Model_Factory::getStorage()->get($key);
        if (empty($value) || 'Active' != $value['status']) {
            return false;
        }
        $this->setActionParam('cms_redirection_key', $key);
        return Sao_Yves_Library_Routing_UrlManager::ROUTE_CMS_REDIRECTION_VIEW;
    }
}
