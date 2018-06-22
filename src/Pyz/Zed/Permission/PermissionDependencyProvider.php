<?php
/**
 * Copyright © 2018-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Permission;

use Spryker\Zed\CompanyRole\Communication\Plugin\PermissionStoragePlugin;
use \Spryker\Zed\Permission\PermissionDependencyProvider as SprykerPermissionDependencyProvider;
use Spryker\Zed\ShoppingList\Communication\Plugin\ReadShoppingListPermissionPlugin;
use Spryker\Zed\ShoppingList\Communication\Plugin\ShoppingListPermissionStoragePlugin;
use Spryker\Zed\ShoppingList\Communication\Plugin\WriteShoppingListPermissionPlugin;

class PermissionDependencyProvider extends SprykerPermissionDependencyProvider
{
    /**
     * @return \Spryker\Zed\PermissionExtension\Dependency\Plugin\PermissionStoragePluginInterface[]
     */
    protected function getPermissionStoragePlugins(): array
    {
        return [
            new ShoppingListPermissionStoragePlugin(), #ShoppingListFeature
            new PermissionStoragePlugin(),
        ];
    }

    /**
     * @return \Spryker\Shared\PermissionExtension\Dependency\Plugin\PermissionPluginInterface[]
     */
    protected function getPermissionPlugins()
    {
        return [
            new ReadShoppingListPermissionPlugin(), #ShoppingListFeature
            new WriteShoppingListPermissionPlugin(), #ShoppingListFeature
        ];
    }
}
