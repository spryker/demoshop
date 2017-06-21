<?php

namespace Pyz\Zed\CmsBlockGui;


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
            new CmsBlockProductAbstractFormPlugin()
        ]);

        return $plugins;
    }
}