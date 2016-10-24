<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Category;

use Spryker\Zed\Category\CategoryDependencyProvider as SprykerDependencyProvider;
use Spryker\Zed\ProductCategory\Communication\Plugin\RemoveProductsAssignmentPlugin;

class CategoryDependencyProvider extends SprykerDependencyProvider
{

    /**
     * @return \Spryker\Zed\Category\Dependency\Plugin\CategoryDeletePluginInterface[]
     */
    protected function getDeletePluginStack()
    {
        $deletePlugins = array_merge(
            [
                new RemoveProductsAssignmentPlugin(),
            ],
            parent::getDeletePluginStack()
        );

        return $deletePlugins;
    }

}
