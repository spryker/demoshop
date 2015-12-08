<?php

namespace Pyz\Zed\Cart;

use SprykerFeature\Zed\ProductOptionCartConnector\Communication\Plugin\CartItemGroupKeyOptionPlugin;
use SprykerFeature\Zed\Cart\Communication\Plugin\SkuGroupKeyPlugin;
use SprykerFeature\Zed\ProductOptionCartConnector\Communication\Plugin\CartItemProductOptionPlugin;
use SprykerFeature\Zed\PriceCartConnector\Communication\Plugin\CartItemPricePlugin;
use SprykerFeature\Zed\ProductCartConnector\Communication\Plugin\ProductCartPlugin;
use SprykerFeature\Zed\Cart\CartConfig as SprykerCartConfig;
use SprykerFeature\Zed\Cart\Dependency\ItemExpanderPluginInterface;

class CartConfig extends SprykerCartConfig
{

    /**
     * @return array|ItemExpanderPluginInterface[]
     */
    public function getCartItemPlugins()
    {
        $plugins = parent::getCartItemPlugins();

        $plugins[] = new ProductCartPlugin();
        $plugins[] = new CartItemPricePlugin();
        $plugins[] = new CartItemProductOptionPlugin();
        $plugins[] = new SkuGroupKeyPlugin();
        $plugins[] = new CartItemGroupKeyOptionPlugin();

        return $plugins;
    }

}
