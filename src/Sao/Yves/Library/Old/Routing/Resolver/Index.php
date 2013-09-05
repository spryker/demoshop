<?php
class Sao_Yves_Library_Routing_Resolver_Index extends ProjectA_Yves_Library_Routing_Resolver_Abstract
{

    protected $segments;

    public function __construct()
    {
        //set segments
        $catalogModel = new Sao_Yves_Catalog_Component_Model_Catalog();
    }


    /**
     * @see CBaseUrlRule::createUrl()
     */
    public function createUrl ($manager, $route, $params, $ampersand)
    {
        if ($route == Sao_Yves_Library_Routing_UrlManager::ROUTE_DEFAULT) {
            //if (isset($params[Yp_Catalog_Model_Facets::$FACET_TYPE['name']])) {
            //    $seg = ProjectA_Shared_Library_Storage::getUrlKey($params[Yp_Catalog_Model_Facets::$FACET_TYPE['name']]);
            //    return $seg;
            //} else {
                return $this->removeIndexFromRoute($route);
            //}
        }
        return false;
    }

    /**
     * @see CBaseUrlRule::parseUrl()
     */
    public function parseUrl ($manager, $request, $pathInfo, $rawPathInfo)
    {
        $pathElements = explode('/', $pathInfo);
        if (isset($pathElements[0]) && $this->isSegment($pathElements[0]) && count($pathElements) < 2) {
            $this->setSegment($this->segments[$pathElements[0]]);
            return Sao_Yves_Library_Routing_UrlManager::ROUTE_DEFAULT;
        }
        return false;
    }


    /**
     * Checks if string is a translated segment, e.g. pkw
     * @param string $string
     */
    protected function isSegment($string)
    {
        return isset($this->segments[$string]) ? $this->segments[$string] : false;
    }

    /**
     * Set the current segment
     * @param string $segmentName
     */
    public function setSegment($segmentName)
    {
        $this->setActionParam(Sao_Yves_Catalog_Component_Model_Facets::$FACET_TYPE['name'], $segmentName);
    }



}
