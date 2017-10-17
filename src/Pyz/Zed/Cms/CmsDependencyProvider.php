<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Cms;

use Spryker\Zed\Cms\CmsDependencyProvider as SprykerCmsDependencyProvider;
use Spryker\Zed\CmsContentWidget\Communication\Plugin\CmsPageDataExpander\CmsPageParameterMapExpanderPlugin;
use Spryker\Zed\CmsUserConnector\Communication\Plugin\UserCmsVersionPostSavePlugin;
use Spryker\Zed\CmsUserConnector\Communication\Plugin\UserCmsVersionTransferExpanderPlugin;
use Spryker\Zed\Kernel\Container;

class CmsDependencyProvider extends SprykerCmsDependencyProvider
{
    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return array
     */
    protected function getPostSavePlugins(Container $container)
    {
        return [
            new UserCmsVersionPostSavePlugin(),
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return array
     */
    protected function getTransferExpanderPlugins(Container $container)
    {
        return [
            new UserCmsVersionTransferExpanderPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\Cms\Dependency\Plugin\CmsPageDataExpanderPluginInterface[]
     */
    protected function getCmsPageDataExpanderPlugins()
    {
        return [
            new CmsPageParameterMapExpanderPlugin(),
        ];
    }
}
