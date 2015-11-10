<?php

namespace Pyz\Zed\CustomerMailQueueConnector;

use SprykerEngine\Zed\Kernel\AbstractBundleDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class CustomerMailQueueConnectorDependencyProvider extends AbstractBundleDependencyProvider
{
    const FACADE_MAIL_QUEUE = 'mail queue facade';

    /**
     * @param Container $container
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container[self::FACADE_MAIL_QUEUE] = function (Container $container) {
            return $container->getLocator()->mailQueue()->facade();
        };
        return $container;
    }
}
