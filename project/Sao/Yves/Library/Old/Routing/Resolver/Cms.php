<?php
class Sao_Yves_Library_Routing_Resolver_Cms extends ProjectA_Yves_Library_Routing_Resolver_Abstract
{
	/**
     * @see CBaseUrlRule::createUrl()
     */
    public function createUrl ($manager, $route, $params, $ampersand)
    {
        if($route === Sao_Yves_Library_Routing_UrlManager::ROUTE_CMS_PAGE_VIEW && isset($params['cms_key'])) {
            $key = Sao_Shared_Library_Storage::getTranslationSingleKey('cms', preg_replace('~^(?:TEXT|URL|TITLE)_~i', '', $params['cms_key']));
            $data = Sao_Yves_Application_Component_Model_Factory::getStorage()->get($key);
            if (empty($data) || !isset($data['url'])) {
                return false;
            }
            return $data['url'];
        }
        return false;
    }

	/**
     * @see CBaseUrlRule::parseUrl()
     */
    public function parseUrl ($manager, $request, $pathInfo, $rawPathInfo)
    {
        $key = Sao_Shared_Library_Storage::getCmsUrlkey('/' . $pathInfo);
        $value = Sao_Yves_Application_Component_Model_Factory::getStorage()->get($key);
        if (empty($value) || 0 != $value['status']) {
            return false;
        }
        $this->setActionParam('cms_key', $key);
        return Sao_Yves_Library_Routing_UrlManager::ROUTE_CMS_PAGE_VIEW;
    }
}