<?php

namespace Pyz\Zed\CmsBlock;


use Spryker\Zed\CmsBlockCategoryConnector\Communication\Plugin\CmsBlockCategoryConnectorUpdatePlugin;
use Spryker\Zed\CmsBlockProductConnector\Communication\Plugin\CmsBlockProductAbstractUpdatePlugin;

class CmsBlockDependencyProvider extends \Spryker\Zed\CmsBlock\CmsBlockDependencyProvider
{
    protected function getCmsBlockUpdatePlugins()
    {
        return [
            new CmsBlockCategoryConnectorUpdatePlugin(),
            new CmsBlockProductAbstractUpdatePlugin()
        ];
    }
}