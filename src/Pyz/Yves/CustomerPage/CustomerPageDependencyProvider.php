<?php
/**
 * Copyright © 2018-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\CustomerPage;

use SprykerShop\Yves\CustomerPage\CustomerPageDependencyProvider as SprykerCustomerPageDependencyProvider;
use SprykerShop\Yves\ShoppingListWidget\Plugin\CustomerPage\ShoppingListMenuItemWidgetPlugin;

class CustomerPageDependencyProvider extends SprykerCustomerPageDependencyProvider
{
    /**
     * @return string[]
     */
    protected function getCustomerMenuItemWidgetPlugins(): array
    {
        return [
            ShoppingListMenuItemWidgetPlugin::class, #ShoppingListFeature
        ];
    }
}
