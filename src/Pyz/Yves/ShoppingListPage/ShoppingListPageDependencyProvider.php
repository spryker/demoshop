<?php
/**
 * Copyright © 2018-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\ShoppingListPage;

use Spryker\Client\AvailabilityStorage\Plugin\ProductViewAvailabilityStorageExpanderPlugin;
use Spryker\Client\PriceProductStorage\Plugin\ProductViewPriceExpanderPlugin;
use Spryker\Client\ProductImageStorage\Plugin\ProductViewImageExpanderPlugin;
use SprykerShop\Yves\ShoppingListPage\ShoppingListPageDependencyProvider as SprykerShoppingListPageDependencyProvider;

class ShoppingListPageDependencyProvider extends SprykerShoppingListPageDependencyProvider
{

    /**
     * @return \Spryker\Client\ProductStorage\Dependency\Plugin\ProductViewExpanderPluginInterface[]
     */
    protected function getShoppingListItemExpanderPlugins(): array
    {
        return [
            new ProductViewPriceExpanderPlugin(),
            new ProductViewImageExpanderPlugin(),
            new ProductViewAvailabilityStorageExpanderPlugin(),
        ];
    }
}
