<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Queue;

use Generated\Shared\Transfer\RabbitMqConsumerOptionTransfer;
use Spryker\Shared\Event\EventConstants;
use Spryker\Shared\Queue\QueueConstants;
use Spryker\Zed\Queue\QueueConfig as SprykerQueueConfig;

class QueueConfig extends SprykerQueueConfig
{
    /**
     * @return array
     */
    protected function getQueueReceiverOptions()
    {
        return [
            QueueConstants::QUEUE_DEFAULT_RECEIVER => [
                'rabbitmq' => $this->getRabbitMqQueueConsumerOptions(),
            ],
            EventConstants::EVENT_QUEUE => [
                'rabbitmq' => $this->getRabbitMqQueueConsumerOptions(),
            ],
        ];
    }

    /**
     * @return array
     */
    protected function getMessageCheckOption()
    {
        return [
            QueueConstants::QUEUE_WORKER_MESSAGE_CHECK_OPTION => [
                'rabbitmq' => $this->getRabbitMqQueueMessageCheckOptions(),
            ],
        ];
    }

    /**
     * @return \Generated\Shared\Transfer\RabbitMqConsumerOptionTransfer
     */
    protected function getRabbitMqQueueMessageCheckOptions()
    {
        $queueOptionTransfer = $this->getRabbitMqQueueConsumerOptions();
        $queueOptionTransfer->setRequeueOnReject(true);

        return $queueOptionTransfer;
    }

    /**
     * @return \Generated\Shared\Transfer\RabbitMqConsumerOptionTransfer
     */
    protected function getRabbitMqQueueConsumerOptions()
    {
        $queueOptionTransfer = new RabbitMqConsumerOptionTransfer();
        $queueOptionTransfer->setConsumerExclusive(false);
        $queueOptionTransfer->setNoWait(false);

        return $queueOptionTransfer;
    }
}
