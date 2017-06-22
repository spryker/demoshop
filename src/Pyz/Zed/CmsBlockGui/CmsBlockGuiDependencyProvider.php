<?php

namespace Pyz\Zed\CmsBlockGui;


use Spryker\Zed\CmsBlockCategoryConnector\Communication\Plugin\CmsBlockCategoryFormPlugin;
use Spryker\Zed\CmsBlockProductConnector\Communication\Plugin\CmsBlockProductAbstractFormPlugin;

class CmsBlockGuiDependencyProvider extends \Spryker\Zed\CmsBlockGui\CmsBlockGuiDependencyProvider
{
    /**
     * @return array
     */
    protected function getCmsBlockFormPlugins()
    {
        $plugins = parent::getCmsBlockFormPlugins();
        $plugins = array_merge($plugins, [
            new CmsBlockCategoryFormPlugin(),
            new CmsBlockProductAbstractFormPlugin()
        ]);

        return $plugins;
    }
}