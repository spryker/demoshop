<?php

namespace Pyz\Zed\Cms;

use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Cms\CmsDependencyProvider as SprykerCmsDependencyProvider;

class CmsDependencyProvider extends SprykerCmsDependencyProvider
{

    const FACADE_GLOSSARY = 'glossary facade';
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
        parent::provideBusinessLayerDependencies($container);

        $container[self::FACADE_GLOSSARY] = function (Container $container) {
            return $container->getLocator()->glossary()->facade();
        };

        $container[self::FACADE_LOCALE] = function (Container $container) {
            return $container->getLocator()->locale()->facade();
        };

        $container[self::FACADE_URL] = function (Container $container) {
            return $container->getLocator()->url()->facade();
        };

        $container[self::FACADE_TOUCH] = function (Container $container) {
            return $container->getLocator()->touch()->facade();
        };

        return $container;
    }

}
