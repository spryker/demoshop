<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Category;

use Spryker\Zed\Category\CategoryDependencyProvider as SprykerDependencyProvider;
use Spryker\Zed\Cms\Communication\Plugin\ReadCmsBlockCategoryRelationPlugin;
use Spryker\Zed\Cms\Communication\Plugin\RemoveCmsBlockCategoryRelationPlugin;
use Spryker\Zed\ProductCategory\Communication\Plugin\ReadProductCategoryRelationPlugin;
use Spryker\Zed\ProductCategory\Communication\Plugin\RemoveProductCategoryRelationPlugin;
use Spryker\Zed\ProductCategory\Communication\Plugin\UpdateProductCategoryRelationPlugin;

class CategoryDependencyProvider extends SprykerDependencyProvider
{

    /**
     * @return \Spryker\Zed\Category\Dependency\Plugin\CategoryRelationDeletePluginInterface[]
     */
    protected function getRelationDeletePluginStack()
    {
        $deletePlugins = array_merge(
            [
                new RemoveProductCategoryRelationPlugin(),
                new RemoveCmsBlockCategoryRelationPlugin(),
            ],
            parent::getRelationDeletePluginStack()
        );

        return $deletePlugins;
    }

    /**
     * @return \Spryker\Zed\Category\Dependency\Plugin\CategoryRelationUpdatePluginInterface[]
     */
    protected function getRelationUpdatePluginStack()
    {
        return array_merge(
            [
                new UpdateProductCategoryRelationPlugin(),
            ],
            parent::getRelationUpdatePluginStack()
        );
    }

    /**
     * @return \Spryker\Zed\Category\Dependency\Plugin\CategoryRelationReadPluginInterface[]
     */
    protected function getRelationReadPluginStack()
    {
        $readPlugins = array_merge(
            [
                new ReadProductCategoryRelationPlugin(),
                new ReadCmsBlockCategoryRelationPlugin(),
            ],
            parent::getRelationReadPluginStack()
        );

        return $readPlugins;
    }

}
