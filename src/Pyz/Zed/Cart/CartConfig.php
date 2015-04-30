<?php

namespace Pyz\Zed\Cart;

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
        $plugins[] = $this->getLocator()->priceCartConnector()->pluginCartItemPricePlugin();

        return $plugins;
    }
}
