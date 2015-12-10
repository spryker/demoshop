<?php

namespace Pyz\Zed\MailQueue;

use SprykerEngine\Zed\Kernel\AbstractBundleDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class MailQueueDependencyProvider extends AbstractBundleDependencyProvider
{

    const FACADE_MAIL = 'mail facade';
    const FACADE_QUEUE = 'queue facade';
    const FACADE_MAIL_QUEUE = 'mail queue facade';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container[self::FACADE_MAIL] = function (Container $container) {
            return $container->getLocator()->mail()->facade();
        };

        $container[self::FACADE_QUEUE] = function (Container $container) {
            return $container->getLocator()->queue()->facade();
        };

        $container[self::FACADE_MAIL_QUEUE] = function (Container $container) {
            return $container->getLocator()->mailQueue()->facade();
        };

        return $container;
    }

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideCommunicationLayerDependencies(Container $container)
    {
        $container[self::FACADE_MAIL] = function (Container $container) {
            return $container->getLocator()->mail()->facade();
        };

        $container[self::FACADE_QUEUE] = function (Container $container) {
            return $container->getLocator()->queue()->facade();
        };

        $container[self::FACADE_MAIL_QUEUE] = function (Container $container) {
            return $container->getLocator()->mailQueue()->facade();
        };

        return $container;
    }

}
