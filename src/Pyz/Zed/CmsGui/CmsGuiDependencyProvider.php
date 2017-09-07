<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CmsGui;

use Spryker\Zed\CmsGui\CmsGuiDependencyProvider as SprykerCmsGuiDependencyProvider;
use Spryker\Zed\CmsGui\Communication\Plugin\CmsPageTableExpanderPlugin;
use Spryker\Zed\CmsGui\Communication\Plugin\CreateGlossaryExpanderPlugin;

class CmsGuiDependencyProvider extends SprykerCmsGuiDependencyProvider
{

    /**
     * @return \Spryker\Zed\CmsGui\Dependency\Plugin\CmsPageTableExpanderPluginInterface[]
     */
    protected function getCmsPageTableExpanderPlugins()
    {
        return [
            new CmsPageTableExpanderPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\CmsGui\Dependency\Plugin\CreateGlossaryExpanderPluginInterface[]
     */
    protected function getCreateGlossaryExpanderPlugins()
    {
        return [
            new CreateGlossaryExpanderPlugin(),
        ];
    }

}
