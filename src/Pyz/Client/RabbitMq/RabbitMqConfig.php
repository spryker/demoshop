<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\RabbitMq;

use ArrayObject;
use Generated\Shared\Transfer\RabbitMqOptionTransfer;
use Spryker\Client\RabbitMq\Model\Connection\Connection;
use Spryker\Client\RabbitMq\RabbitMqConfig as SprykerRabbitMqConfig;
use Spryker\Shared\Event\EventConstants;

class RabbitMqConfig extends SprykerRabbitMqConfig
{

    /**
     * @return \ArrayObject
     */
    protected function getQueueOptions()
    {
        $queueOptionCollection = new ArrayObject();
        $queueOptionCollection->append($this->createQueueOption(EventConstants::EVENT_QUEUE, EventConstants::EVENT_ERROR_QUEUE));

        return $queueOptionCollection;
    }

    /**
     * @param string $queueName
     * @param string $errorQueueName
     * @param string $routingKey
     *
     * @return \Generated\Shared\Transfer\RabbitMqOptionTransfer
     */
    protected function createQueueOption($queueName, $errorQueueName, $routingKey = 'error')
    {
        $queueOption = new RabbitMqOptionTransfer();
        $queueOption
            ->setQueueName($queueName)
            ->setDurable(true)
            ->setType('direct')
            ->setDeclarationType(Connection::RABBIT_MQ_EXCHANGE)
            ->addBindingQueueItem($this->createQueueBinding($queueName))
            ->addBindingQueueItem($this->createErrorQueueBinding($errorQueueName, $routingKey));

        return $queueOption;
    }

    /**
     * @param string $queueName
     *
     * @return \Generated\Shared\Transfer\RabbitMqOptionTransfer
     */
    protected function createQueueBinding($queueName)
    {
        $queueOption = new RabbitMqOptionTransfer();
        $queueOption
            ->setQueueName($queueName)
            ->setDurable(true);

        return $queueOption;
    }

    /**
     * @param string $errorQueueName
     * @param string $routingKey
     *
     * @return \Generated\Shared\Transfer\RabbitMqOptionTransfer
     */
    protected function createErrorQueueBinding($errorQueueName, $routingKey)
    {
        $queueOption = new RabbitMqOptionTransfer();
        $queueOption
            ->setQueueName($errorQueueName)
            ->setDurable(true)
            ->setRoutingKey($routingKey);

        return $queueOption;
    }

}
