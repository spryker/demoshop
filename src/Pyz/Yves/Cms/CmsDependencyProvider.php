<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cms;

use Spryker\Yves\CmsContentWidget\Plugin\CmsTwigContentRendererPlugin;
use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class CmsDependencyProvider extends AbstractBundleDependencyProvider
{

    const CMS_TWIG_CONTENT_RENDERER_PLUGIN = 'cms twig content renderer plugin';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container[static::CMS_TWIG_CONTENT_RENDERER_PLUGIN] = function (Container $container) {
            return new CmsTwigContentRendererPlugin();
        };

        return $container;
    }

}
