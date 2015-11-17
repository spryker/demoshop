<?php

namespace Pyz\Zed\MailQueue;

use SprykerEngine\Zed\Kernel\AbstractBundleDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class MailQueueDependencyProvider extends AbstractBundleDependencyProvider
{

    const MAIL_FACADE = 'mail facade';
    const QUEUE_FACADE = 'queue facade';
    const MAIL_QUEUE_FACADE = 'mail queue facade';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container[self::MAIL_FACADE] = function (Container $container) {
            return $container->getLocator()->mail()->facade();
        };

        $container[self::QUEUE_FACADE] = function (Container $container) {
            return $container->getLocator()->queue()->facade();
        };

        $container[self::MAIL_QUEUE_FACADE] = function (Container $container) {
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
        $container[self::MAIL_FACADE] = function (Container $container) {
            return $container->getLocator()->mail()->facade();
        };

        $container[self::QUEUE_FACADE] = function (Container $container) {
            return $container->getLocator()->queue()->facade();
        };

        $container[self::MAIL_QUEUE_FACADE] = function (Container $container) {
            return $container->getLocator()->mailQueue()->facade();
        };

        return $container;
    }

}
