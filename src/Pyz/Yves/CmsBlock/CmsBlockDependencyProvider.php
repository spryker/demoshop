<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\CmsBlock;

use \Spryker\Yves\CmsBlock\CmsBlockDependencyProvider as SprykerCmsBlockDependencyProvider;
use Spryker\Yves\CmsContentWidget\Plugin\CmsTwigContentRendererPlugin;

class CmsBlockDependencyProvider extends SprykerCmsBlockDependencyProvider
{

    /**
     * @return \Spryker\Yves\CmsContentWidget\Plugin\CmsTwigContentRendererPluginInterface
     */
    protected function getCmsBlockTwigContentRendererPlugin()
    {
        return new CmsTwigContentRendererPlugin();
    }

}
