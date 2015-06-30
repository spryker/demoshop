<?php

namespace Pyz\Zed\Queue;

use SprykerFeature\Zed\Queue\Dependency\Plugin\TaskPluginInterface;
use SprykerFeature\Zed\Queue\QueueConfig as CoreQueueConfig;

class QueueConfig extends CoreQueueConfig
{

    /**
     * @return TaskPluginInterface[]
     */
    public function getWorkerTasks()
    {
        return [
            $this->getLocator()->glossaryQueue()->pluginGlossaryTaskWorkerPlugin(),
        ];
    }
}
