<?php
class Sao_Yves_Library_Routing_Resolver_CartProduct extends ProjectA_Yves_Library_Routing_Resolver_Abstract
{

    /**
     * @see CBaseUrlRule::createUrl()
     */
    public function createUrl ($manager, $route, $params, $ampersand)
    {
        var_dump($params);
        if ($route == Sao_Yves_Library_Routing_UrlManager::ROUTE_CART_PRODUCT) {
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
        //TODO that regex could be more specific
        if (!preg_match('/product\/[0-9]*/', $pathInfo)) {
            return false;
        }

        $sku = preg_split('/\//', $pathInfo)[1];
        $this->setActionParam('sku', $sku);

        return 'cart/product/update';
    }
}