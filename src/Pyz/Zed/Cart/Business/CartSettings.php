<?php

namespace Pyz\Zed\Cart\Business;

use SprykerFeature\Zed\Cart\Business\CartSettings as SprykerCartSettings;
use SprykerFeature\Zed\Cart\Dependency\ItemExpanderPluginInterface;

class CartSettings extends SprykerCartSettings
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
