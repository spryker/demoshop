<?php

namespace Pyz\Zed\Cart;

use Spryker\Zed\Cart\CartConfig as SprykerCartConfig;
use Spryker\Zed\Cart\Communication\Plugin\SkuGroupKeyPlugin;
use Spryker\Zed\PriceCartConnector\Communication\Plugin\CartItemPricePlugin;
use Spryker\Zed\ProductCartConnector\Communication\Plugin\ProductCartPlugin;
use Spryker\Zed\ProductOptionCartConnector\Communication\Plugin\CartItemGroupKeyOptionPlugin;
use Spryker\Zed\ProductOptionCartConnector\Communication\Plugin\CartItemProductOptionPlugin;

class CartConfig extends SprykerCartConfig
{

    /**
     * @return array|\Spryker\Zed\Cart\Dependency\ItemExpanderPluginInterface[]
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
