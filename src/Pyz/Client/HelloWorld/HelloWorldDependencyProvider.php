<?php

namespace Pyz\Client\HelloWorld;

use Spryker\Client\Customer\CustomerDependencyProvider;
use Spryker\Client\Kernel\Container;

class HelloWorldDependencyProvider extends CustomerDependencyProvider
{
    const ZED_REQUEST_CLIENT = 'zed.request.client';

    public function provideServiceLayerDependencies(Container $container)
    {
        $container[self::ZED_REQUEST_CLIENT] = function (Container $container) {
            return $container->getLocator()->zedRequest()->client();
        };

        return $container;
    }
}
