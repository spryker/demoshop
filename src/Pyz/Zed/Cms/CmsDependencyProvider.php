<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Cms;

use Spryker\Shared\CmsProductConnector\ContentWidgetConfigurationProvider\CmsProductContentWidgetConfigurationProvider;
use Spryker\Shared\CmsProductGroupConnector\ContentWidgetConfigurationProvider\CmsProductGroupContentWidgetConfigurationProvider;
use Spryker\Shared\CmsProductSetConnector\ContentWidgetConfigurationProvider\CmsProductSetContentWidgetConfigurationProvider;
use Spryker\Zed\Cms\CmsDependencyProvider as SprykerCmsDependencyProvider;
use Spryker\Zed\CmsProductConnector\Communication\Plugin\Cms\CmsProductSkuMapperPlugin;
use Spryker\Zed\CmsProductSetConnector\Communication\Plugin\Cms\CmsProductSetKeyMapperPlugin;
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
            new UserCmsVersionPostSavePlugin()
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
            new UserCmsVersionTransferExpanderPlugin()
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return array|\Spryker\Zed\Cms\Dependency\Plugin\CmsContentWidgetParameterMapperPluginInterface[]
     */
    protected function getCmsContentWidgetParameterMapperPlugins(Container $container)
    {
        return [
            CmsProductContentWidgetConfigurationProvider::FUNCTION_NAME => new CmsProductSkuMapperPlugin(),
            CmsProductSetContentWidgetConfigurationProvider::FUNCTION_NAME => new CmsProductSetKeyMapperPlugin(),
            CmsProductGroupContentWidgetConfigurationProvider::FUNCTION_NAME => new CmsProductSkuMapperPlugin(),
        ];
    }

}
