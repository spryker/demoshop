<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Cms;

use Spryker\Shared\CmsProductConnector\ContentWidgetConfigurationProvider\CmsProductContentWidgetConfigurationProvider;
use Spryker\Shared\CmsProductGroupConnector\ContentWidgetConfigurationProvider\CmsProductGroupContentWidgetConfigurationProvider;
use Spryker\Shared\CmsProductSetConnector\ContentWidgetConfigurationProvider\CmsProductSetContentWidgetConfigurationProvider;
use Spryker\Zed\Cms\CmsConfig as SprykerCmsConfig;

class CmsConfig extends SprykerCmsConfig
{

    /**
     * @return bool
     */
    public function appendPrefixToCmsPageUrl()
    {
        return true;
    }

    /**
     * @return array|\Spryker\Shared\Cms\CmsContentWidget\CmsContentWidgetConfigurationProviderInterface[]
     */
    public function getCmsContentWidgetConfigurationProviders()
    {
        return [
            CmsProductContentWidgetConfigurationProvider::FUNCTION_NAME => new CmsProductContentWidgetConfigurationProvider(),
            CmsProductSetContentWidgetConfigurationProvider::FUNCTION_NAME => new CmsProductSetContentWidgetConfigurationProvider(),
            CmsProductGroupContentWidgetConfigurationProvider::FUNCTION_NAME => new CmsProductGroupContentWidgetConfigurationProvider(),
        ];
    }

}
