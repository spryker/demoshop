<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Application;

use Pyz\Yves\Application\Plugin\Pimple;
use Pyz\Yves\Twig\Plugin\TwigYves;
use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class ApplicationDependencyProvider extends AbstractBundleDependencyProvider
{

    const CLIENT_SESSION = 'session client';
    const CLIENT_CATALOG = 'catalog client';
    const PLUGIN_APPLICATION = 'application plugin';
    const PLUGIN_TWIG = 'twig plugin';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container = $this->provideClients($container);
        $container = $this->providePlugins($container);

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

}
