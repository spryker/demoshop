<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\HelloSpryker;

use Spryker\Client\Customer\CustomerDependencyProvider as SprykerCustomerDependencyProvider;
use Spryker\Client\Kernel\Container;

class HelloSprykerDependencyProvider extends SprykerCustomerDependencyProvider
{
    const CLIENT_ZED_REQUEST = 'CLIENT_ZED_REQUEST';
    const CLIENT_HELLO_SPRYKER = 'CLIENT_HELLO_SPRYKER';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container)
    {
        $container = $this->addZedRequestClient($container);
        $container = $this->addHelloSprykerClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addZedRequestClient(Container $container): Container
    {
        $container[static::CLIENT_ZED_REQUEST] = function (Container $container) {
            return $container->getLocator()->zedRequest()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addHelloSprykerClient(Container $container): Container
    {
        $container[static::CLIENT_HELLO_SPRYKER] = function (Container $container) {
            return $container->getLocator()->helloSpryker()->client();
        };

        return $container;
    }
}
