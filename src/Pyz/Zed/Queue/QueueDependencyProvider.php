<?php

namespace Pyz\Zed\Queue;

use SprykerEngine\Zed\Kernel\AbstractBundleDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class QueueDependencyProvider extends AbstractBundleDependencyProvider
{
    const WORKER_TASKS = 'worker tasks';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container[self::WORKER_TASKS] = function (Container $container) {
            return [
                $container->getLocator()->mailQueue()->facade()->getWorker()
            ];
        };
        return $container;
    }
}
