<?php

namespace Pyz\Yves\ShopApplication;

// use SprykerShop\Yves\CustomerPage\Plugin\ShopUi\CustomerNavigationWidgetPlugin;
use SprykerShop\Yves\ShopApplication\ShopApplicationDependencyProvider as SprykerShopApplicationDependencyProvider;

class ShopApplicationDependencyProvider extends SprykerShopApplicationDependencyProvider
{
    /**
     * @return string[]
     */
    protected function getGlobalWidgetPlugins(): array
    {
        return [
            //...
            //CustomerNavigationWidgetPlugin::class,
        ];
    }
}