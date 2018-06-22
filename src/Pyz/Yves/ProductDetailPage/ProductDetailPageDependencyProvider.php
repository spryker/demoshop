<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductDetailPage;

use SprykerShop\Yves\AvailabilityWidget\Plugin\ProductDetailPage\AvailabilityWidgetPlugin;
use SprykerShop\Yves\ProductDetailPage\Dependency\Plugin\AvailabilityWidget\AvailabilityWidgetPluginInterface;
use SprykerShop\Yves\ProductDetailPage\ProductDetailPageDependencyProvider as SprykerShopProductDetailPageDependencyProvider;
use SprykerShop\Yves\ShoppingListWidget\Plugin\ProductDetailPage\ShoppingListWidgetPlugin;

class ProductDetailPageDependencyProvider extends SprykerShopProductDetailPageDependencyProvider
{
    /**
     * @return \Spryker\Yves\Kernel\Dependency\Plugin\WidgetPluginInterface[]
     */
    protected function getProductDetailPageWidgetPlugins(): array
    {
        return [
            ShoppingListWidgetPlugin::class, #ShoppingListFeature
            AvailabilityWidgetPlugin::class
        ];
    }
}
