<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CmsCollector;

use Spryker\Zed\CmsCollector\CmsCollectorDependencyProvider as SprykerCmsCollectorDependencyProvider;
use Spryker\Zed\CmsContentWidget\Communication\Plugin\CmsPageCollector\CmsPageCollectorParameterMapExpanderPlugin;

class CmsCollectorDependencyProvider extends SprykerCmsCollectorDependencyProvider
{

    /**
     * Stack of plugins which run during data collection for each item.
     *
     * @return array|\Spryker\Zed\CmsCollector\Dependency\Plugin\CmsPageCollectorDataExpanderPluginInterface[]
     */
    protected function getCollectorDataExpanderPlugins()
    {
        return [
            new CmsPageCollectorParameterMapExpanderPlugin(),
        ];
    }

}
