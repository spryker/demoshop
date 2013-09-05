<?php
class Sao_Yves_Library_Routing_Resolver_ProductListing extends ProjectA_Yves_Library_Routing_Resolver_Abstract
{
    const SIZE_REGEX = '~^(\d+(?:\.\d+)?)-(\d+(?:\.\d+)?)-([a-z-\.]{1,2})(\d+(?:\.\d+)?)$~i';

    /**
     * @var ProjectA_Yves_Interface_Component_Model_Storage
     */
    protected $storage;
    /**
     * @var array
     */
    protected $facets;

    public function __construct()
    {
        $this->storage = Sao_Yves_Application_Component_Model_Factory::getStorage();
    }

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
     * @todo currently only processing /cat/!!
     */
    public function parseUrl ($manager, $request, $pathInfo, $rawPathInfo)
    {
        $element = str_replace('/', '', $pathInfo);

        //check:categories
        $key = ProjectA_Shared_Library_Storage::getCategoryUrlKey($element);
        $value = $this->storage->get($key);

        if ($value) {
            //set category facet active
            $this->setFacet(Sao_Yves_Catalog_Component_Model_Facets::$FACET_CATEGORY['param'], $value);
        } else {
            return false;
        }

        $this->isCmsCatalogListing($request);

        return Sao_Yves_Library_Routing_UrlManager::ROUTE_CATALOG;
    }

    private function getNumeric($value)
    {
        if (!strstr($value, '.')) {
            $value = number_format($value, 1);
        }

        return $value;
    }

    /**
     * Set a resolved facet value
     * @param string $key
     * @param mixed $values
     */
    protected function setFacet($key, $value)
    {
        $this->setActionParam($key, $value);
    }

    /**
     * @param $request
     * @return bool
     */
    protected function isCmsCatalogListing($request)
    {
        $urls = $this->getUrlsForMultiLookup($request);
        $pages = Sao_Yves_Application_Component_Model_Factory::getStorage()->getMulti($urls);
        foreach ($pages as $pageKey => $pageData) {
            if (!empty($pageData) && 0 == $pageData['status'] && isset($pageData['elements'])) {
                $this->setActionParam('cms_key', $pageKey);
                return true;
            }
        }
        return false;
    }

    /**
     * @param $request
     * @return array
     */
    protected function getUrlsForMultiLookup($request)
    {
        $urls = array(ProjectA_Shared_Library_Storage::getCmsUrlkey($request->getRequestUri()));
        if ($request->getRequestUri() !== '/' . $request->getPathInfo()) {
            $urls[] = ProjectA_Shared_Library_Storage::getCmsUrlkey('/' . $request->getPathInfo());
        }
        return $urls;
    }

}
