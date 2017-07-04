<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CmsContentWidget;

use Spryker\Shared\CmsContentWidgetProductConnector\ContentWidgetConfigurationProvider\CmsProductContentWidgetConfigurationProvider;
use Spryker\Shared\CmsContentWidgetProductGroupConnector\ContentWidgetConfigurationProvider\CmsProductGroupContentWidgetConfigurationProvider;
use Spryker\Shared\CmsContentWidgetProductSetConnector\ContentWidgetConfigurationProvider\CmsProductSetContentWidgetConfigurationProvider;
use Spryker\Zed\CmsContentWidget\CmsContentWidgetDependencyProvider as SprykerCmsContentWidgetDependencyProvider;
use Spryker\Zed\CmsContentWidgetProductConnector\Communication\Plugin\Cms\CmsProductSkuMapperPlugin;
use Spryker\Zed\CmsContentWidgetProductSetConnector\Communication\Plugin\Cms\CmsProductSetKeyMapperPlugin;
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
