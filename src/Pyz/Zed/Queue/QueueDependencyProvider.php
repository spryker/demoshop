<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Queue;

use Spryker\Shared\Config\Config;
use Spryker\Shared\Event\EventConstants;
use Spryker\Shared\PriceProductStorage\PriceProductStorageConstants;
use Spryker\Zed\Event\Communication\Plugin\Queue\EventQueueMessageProcessorPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Queue\QueueDependencyProvider as SprykerDependencyProvider;
use Spryker\Zed\Synchronization\Communication\Plugin\Queue\SynchronizationStorageQueueMessageProcessorPlugin;
use SprykerEco\Shared\Loggly\LogglyConstants;
use SprykerEco\Zed\Loggly\Communication\Plugin\LogglyLoggerQueueMessageProcessorPlugin;
use SprykerEco\Zed\Loggly\LogglyConfig;

class QueueDependencyProvider extends SprykerDependencyProvider
{
    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Queue\Dependency\Plugin\QueueMessageProcessorPluginInterface[]
     */
    protected function getProcessorMessagePlugins(Container $container)
    {
        return [
            EventConstants::EVENT_QUEUE => new EventQueueMessageProcessorPlugin(),
            PriceProductStorageConstants::PRICE_SYNC_STORAGE_QUEUE => new SynchronizationStorageQueueMessageProcessorPlugin(),
            Config::get(LogglyConstants::QUEUE_NAME, LogglyConfig::DEFAULT_QUEUE_NAME) => new LogglyLoggerQueueMessageProcessorPlugin(),
        ];
    }
}
