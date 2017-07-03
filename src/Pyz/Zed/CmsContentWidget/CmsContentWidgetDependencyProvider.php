<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CmsContentWidget;

use Spryker\Shared\CmsProductConnector\ContentWidgetConfigurationProvider\CmsProductContentWidgetConfigurationProvider;
use Spryker\Shared\CmsProductGroupConnector\ContentWidgetConfigurationProvider\CmsProductGroupContentWidgetConfigurationProvider;
use Spryker\Shared\CmsProductSetConnector\ContentWidgetConfigurationProvider\CmsProductSetContentWidgetConfigurationProvider;
use Spryker\Zed\CmsContentWidget\CmsContentWidgetDependencyProvider as SprykerCmsContentWidgetDependencyProvider;
use Spryker\Zed\CmsProductConnector\Communication\Plugin\Cms\CmsProductSkuMapperPlugin;
use Spryker\Zed\CmsProductSetConnector\Communication\Plugin\Cms\CmsProductSetKeyMapperPlugin;
use Spryker\Zed\Kernel\Container;

class CmsContentWidgetDependencyProvider extends SprykerCmsContentWidgetDependencyProvider
{

    /**
     * {@inheritdoc}
     *
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return array|\Spryker\Zed\CmsContentWidget\Dependency\Plugin\CmsContentWidgetParameterMapperPluginInterface[]
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
