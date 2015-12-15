<?php

namespace Pyz\Zed\Queue;

use Pyz\Zed\MailQueue\Communication\Plugin\MailQueueTaskWorkerPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Queue\Dependency\Plugin\TaskPluginInterface;
use Spryker\Zed\Queue\QueueDependencyProvider as CoreQueueDependencyProvider;

class QueueDependencyProvider extends CoreQueueDependencyProvider
{

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        parent::provideBusinessLayerDependencies($container);

        $container[self::WORKER_TASKS] = function () {
            return $this->getMaiQueueTaskPlugins();
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
        parent::provideCommunicationLayerDependencies($container);

        return $container;
    }

    /**
     * @return TaskPluginInterface[]
     */
    protected function getMaiQueueTaskPlugins()
    {
        return [
            new MailQueueTaskWorkerPlugin(),
        ];
    }

}
