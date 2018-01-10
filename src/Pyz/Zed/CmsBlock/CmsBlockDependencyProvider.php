<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CmsBlock;

use Spryker\Zed\CmsBlock\CmsBlockDependencyProvider as CmsBlockCmsBlockDependencyProvider;
use Spryker\Zed\CmsBlock\Communication\Plugin\CmsBlockStoreRelationUpdatePlugin;
use Spryker\Zed\CmsBlockCategoryConnector\Communication\Plugin\CmsBlockCategoryConnectorUpdatePlugin;
use Spryker\Zed\CmsBlockProductConnector\Communication\Plugin\CmsBlockProductAbstractUpdatePlugin;

class CmsBlockDependencyProvider extends CmsBlockCmsBlockDependencyProvider
{
    /**
     * @return array
     */
    protected function getCmsBlockUpdatePlugins()
    {
        $plugins = parent::getCmsBlockUpdatePlugins();

        return array_merge($plugins, [
            new CmsBlockCategoryConnectorUpdatePlugin(),
            new CmsBlockProductAbstractUpdatePlugin(),
            new CmsBlockStoreRelationUpdatePlugin(),
        ]);
    }
}
