<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\CmsContentWidget;

use Pyz\Yves\Product\Plugin\CmsProductContentWidgetPlugin;
use Pyz\Yves\ProductSet\Plugin\CmsProductSetContentWidgetPlugin;
use Spryker\Shared\CmsProductConnector\ContentWidgetConfigurationProvider\CmsProductContentWidgetConfigurationProvider;
use Spryker\Shared\CmsProductGroupConnector\ContentWidgetConfigurationProvider\CmsProductGroupContentWidgetConfigurationProvider;
use Spryker\Shared\CmsProductSetConnector\ContentWidgetConfigurationProvider\CmsProductSetContentWidgetConfigurationProvider;
use Spryker\Yves\CmsContentWidget\CmsContentWidgetDependencyProvider as SprykerCmsContentWidgetDependencyProvider;

class CmsContentWidgetDependencyProvider extends SprykerCmsContentWidgetDependencyProvider
{

    /**
     * {@inheritdoc}
     *
     * @return array|\Spryker\Yves\CmsContentWidget\Dependency\CmsContentWidgetPluginInterface[]
     */
    public function getCmsContentWidgetPlugins()
    {
        return [
            CmsProductContentWidgetConfigurationProvider::FUNCTION_NAME => new CmsProductContentWidgetPlugin(
                new CmsProductContentWidgetConfigurationProvider()
            ),
            CmsProductSetContentWidgetConfigurationProvider::FUNCTION_NAME => new CmsProductSetContentWidgetPlugin(
                new CmsProductSetContentWidgetConfigurationProvider()
            ),
            CmsProductGroupContentWidgetConfigurationProvider::FUNCTION_NAME => new CmsProductContentWidgetPlugin(
                new CmsProductGroupContentWidgetConfigurationProvider()
            ),
        ];
    }

}
