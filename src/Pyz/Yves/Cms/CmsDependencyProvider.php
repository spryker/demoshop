<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cms;

use Spryker\Shared\Kernel\Store;
use Spryker\Yves\CmsContentWidget\Plugin\CmsTwigContentRendererPlugin;
use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class CmsDependencyProvider extends AbstractBundleDependencyProvider
{

    const CMS_TWIG_CONTENT_RENDERER_PLUGIN = 'cms twig content renderer plugin';
    const CLIENT_CUSTOMER = 'CLIENT_CUSTOMER';
    const CLIENT_CMS_COLLECTOR = 'CLIENT_CMS_COLLECTOR';
    const STORE = 'STORE';

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

        $container[static::CLIENT_CUSTOMER] = function (Container $container) {
            return $container->getLocator()->customer()->client();
        };

        $container[static::CLIENT_CMS_COLLECTOR] = function (Container $container) {
            return $container->getLocator()->cmsCollector()->client();
        };

        $container[static::STORE] = function (Container $container) {
            return Store::getInstance();
        };

        return $container;
    }

}
