<?php

namespace Pyz\Zed\Cms;

use Pyz\Zed\Cms\Communication\Plugin\DemoDataInstaller;
use Pyz\Zed\Cms\Dependency\Facade\CmsToLocaleBridge;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Cms\CmsDependencyProvider as SprykerCmsDependencyProvider;
use Spryker\Zed\Cms\Dependency\Facade\CmsToGlossaryBridge;
use Spryker\Zed\Cms\Dependency\Facade\CmsToTouchBridge;
use Spryker\Zed\Cms\Dependency\Facade\CmsToUrlBridge;

class CmsDependencyProvider extends SprykerCmsDependencyProvider
{

    const PLUGIN_DEMO_DATA_INSTALLER = 'demo data installer';

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

        // @todo this is not a external dependency
        $container[self::PLUGIN_DEMO_DATA_INSTALLER] = function (Container $container) {
            return new DemoDataInstaller();
        };

        $container[self::FACADE_GLOSSARY] = function (Container $container) {
            return new CmsToGlossaryBridge($container->getLocator()->glossary()->facade());
        };

        $container[self::FACADE_LOCALE] = function (Container $container) {
            return new CmsToLocaleBridge($container->getLocator()->locale()->facade());
        };

        $container[self::FACADE_URL] = function (Container $container) {
            return new CmsToUrlBridge($container->getLocator()->url()->facade());
        };

        $container[self::FACADE_TOUCH] = function (Container $container) {
            return new CmsToTouchBridge($container->getLocator()->touch()->facade());
        };

        return $container;
    }

}
