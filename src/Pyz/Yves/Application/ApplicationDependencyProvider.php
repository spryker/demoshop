<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Application;

use Pyz\Yves\Twig\Plugin\TwigYves;
use Spryker\Yves\Application\ApplicationDependencyProvider as SprykerApplicationDependencyProvider;
use Spryker\Yves\Kernel\Container;
use Spryker\Yves\Kernel\Plugin\Pimple;

class ApplicationDependencyProvider extends SprykerApplicationDependencyProvider
{
    public const SERVICE_UTIL_DATE_TIME = 'util date time service';

    public const SERVICE_NETWORK = 'util network service';

    public const SERVICE_UTIL_IO = 'util io service';

    public const SERVICE_DATA = 'util data service';

    public const CLIENT_SESSION = 'session client';
    public const CLIENT_CATALOG = 'catalog client';
    public const PLUGIN_APPLICATION = 'application plugin';
    public const PLUGIN_TWIG = 'twig plugin';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container = parent::provideDependencies($container);
        $container = $this->provideClients($container);
        $container = $this->providePlugins($container);
        $container = $this->addUtilDateTimeService($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function provideClients(Container $container)
    {
        $container[self::CLIENT_SESSION] = function (Container $container) {
            return $container->getLocator()->session()->client();
        };
        $container[self::CLIENT_CATALOG] = function (Container $container) {
            return $container->getLocator()->catalog()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function providePlugins(Container $container)
    {
        $container[self::PLUGIN_APPLICATION] = function () {
            $pimplePlugin = new Pimple();

            return $pimplePlugin->getApplication();
        };

        $container[self::PLUGIN_TWIG] = function (Container $container) {
            $twigPlugin = new TwigYves();

            return $twigPlugin->getTwigYvesExtension($container[self::PLUGIN_APPLICATION]);
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addUtilDateTimeService(Container $container)
    {
        $container[self::SERVICE_UTIL_DATE_TIME] = function (Container $container) {
            return $container->getLocator()->utilDateTime()->service();
        };

        return $container;
    }
}
