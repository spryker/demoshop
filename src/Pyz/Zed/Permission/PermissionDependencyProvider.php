<?php

namespace Pyz\Zed\Permission;

use Spryker\Zed\Permission\PermissionDependencyProvider as SprykerPermissionDependencyProvider;
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
            new ShoppingListPermissionStoragePlugin(),
        ];
    }

    /**
     * @return \Spryker\Shared\PermissionExtension\Dependency\Plugin\PermissionPluginInterface[]
     */
    protected function getPermissionPlugins()
    {
        return [
            new ReadShoppingListPermissionPlugin(),
            new WriteShoppingListPermissionPlugin(),
        ];
    }
}