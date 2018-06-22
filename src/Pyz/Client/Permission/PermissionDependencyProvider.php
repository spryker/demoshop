<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Permission;

use Spryker\Client\CompanyUser\Plugin\AddCompanyUserPermissionPlugin;
use Spryker\Client\Permission\PermissionDependencyProvider as SprykerPermissionDependencyProvider;
use Spryker\Client\ShoppingList\Plugin\ReadShoppingListPermissionPlugin;
use Spryker\Client\ShoppingList\Plugin\WriteShoppingListPermissionPlugin;

class PermissionDependencyProvider extends SprykerPermissionDependencyProvider
{
    /**
     * @return \Spryker\Shared\PermissionExtension\Dependency\Plugin\PermissionPluginInterface[]
     */
    protected function getPermissionPlugins(): array
    {
        return [
            new AddCompanyUserPermissionPlugin(), #CompanyUserFeature
            new ReadShoppingListPermissionPlugin(), #ShoppingListFeature
            new WriteShoppingListPermissionPlugin(), #ShoppingListFeature
        ];
    }
}
