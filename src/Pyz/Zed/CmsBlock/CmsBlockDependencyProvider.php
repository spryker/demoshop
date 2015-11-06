<?php

namespace Pyz\Zed\Cms;

use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\Cms\CmsDependencyProvider as SprykerCmsDependencyProvider;

class CmsBlockDependencyProvider extends SprykerCmsDependencyProvider
{

    const FACADE_LOCALE = 'locale facade';

    const FACADE_URL = 'url facade';

    const FACADE_TOUCH = 'touch facade';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container[self::FACADE_LOCALE] = function (Container $container) {
            return $container->getLocator()->locale()->facade();
        };

        $container[self::FACADE_URL] = function (Container $container) {
            return $container->getLocator()->url()->facade();
        };

        $container[self::FACADE_TOUCH] = function (Container $container) {
            return $container->getLocator()->touch()->facade();
        };
    }

    public function provideCommunicationLayerDependencies(Container $container)
    {

    }
}
