<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CmsContentWidget;

use Spryker\Shared\CmsContentWidgetProductConnector\ContentWidgetConfigurationProvider\CmsProductContentWidgetConfigurationProvider;
use Spryker\Shared\CmsContentWidgetProductGroupConnector\ContentWidgetConfigurationProvider\CmsProductGroupContentWidgetConfigurationProvider;
use Spryker\Shared\CmsContentWidgetProductSearchConnector\ContentWidgetConfigurationProvider\CmsProductSearchContentWidgetConfigurationProvider;
use Spryker\Shared\CmsContentWidgetProductSetConnector\ContentWidgetConfigurationProvider\CmsProductSetContentWidgetConfigurationProvider;
use Spryker\Zed\CmsContentWidget\CmsContentWidgetConfig as SprykerCmsContentConfig;

class CmsContentWidgetConfig extends SprykerCmsContentConfig
{
    /**
     * {@inheritdoc}
     *
     * @return array|\Spryker\Shared\CmsContentWidget\Dependency\CmsContentWidgetConfigurationProviderInterface[]
     */
    public function getCmsContentWidgetConfigurationProviders()
    {
        return [
            CmsProductContentWidgetConfigurationProvider::FUNCTION_NAME => new CmsProductContentWidgetConfigurationProvider(),
            CmsProductSetContentWidgetConfigurationProvider::FUNCTION_NAME => new CmsProductSetContentWidgetConfigurationProvider(),
            CmsProductGroupContentWidgetConfigurationProvider::FUNCTION_NAME => new CmsProductGroupContentWidgetConfigurationProvider(),
            CmsProductSearchContentWidgetConfigurationProvider::FUNCTION_NAME => new CmsProductSearchContentWidgetConfigurationProvider(),
        ];
    }
}
