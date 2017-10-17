<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\RabbitMq;

use ArrayObject;
use Generated\Shared\Transfer\RabbitMqOptionTransfer;
use Spryker\Client\RabbitMq\Model\Connection\Connection;
use Spryker\Client\RabbitMq\RabbitMqDependencyProvider as RabbitMqRabbitMqDependencyProvider;
use Spryker\Shared\Event\EventConstants;

class RabbitMqDependencyProvider extends RabbitMqRabbitMqDependencyProvider
{
    /**
     * @return \ArrayObject
     */
    protected function getQueueOptions()
    {
        $queueOptionCollection = new ArrayObject();
        $queueOptionCollection->append($this->createEventExchangeQueueOption());
        $queueOptionCollection->append($this->createEventErrorExchangeQueueOption());

        return $queueOptionCollection;
    }

    /**
     * @return \Generated\Shared\Transfer\RabbitMqOptionTransfer
     */
    protected function createEventExchangeQueueOption()
    {
        $rabbitMqOptionTransfer = new RabbitMqOptionTransfer();
        $rabbitMqOptionTransfer->setQueueName(EventConstants::EVENT_QUEUE);
        $rabbitMqOptionTransfer->setAutoDelete(false);
        $rabbitMqOptionTransfer->setDurable(true);
        $rabbitMqOptionTransfer->setPassive(false);
        $rabbitMqOptionTransfer->setType('direct');
        $rabbitMqOptionTransfer->setDeclarationType(Connection::RABBIT_MQ_EXCHANGE);
        $rabbitMqOptionTransfer->setBindingQueue($this->createEventQueueBinding());

        return $rabbitMqOptionTransfer;
    }

    /**
     * @return \Generated\Shared\Transfer\RabbitMqOptionTransfer
     */
    protected function createEventErrorExchangeQueueOption()
    {
        $rabbitMqOptionTransfer = new RabbitMqOptionTransfer();
        $rabbitMqOptionTransfer->setQueueName(EventConstants::EVENT_QUEUE);
        $rabbitMqOptionTransfer->setAutoDelete(false);
        $rabbitMqOptionTransfer->setDurable(true);
        $rabbitMqOptionTransfer->setPassive(false);
        $rabbitMqOptionTransfer->setType('direct');
        $rabbitMqOptionTransfer->setDeclarationType(Connection::RABBIT_MQ_EXCHANGE);
        $rabbitMqOptionTransfer->setBindingQueue($this->createEventErrorQueueBinding());

        return $rabbitMqOptionTransfer;
    }

    /**
     * @return \Generated\Shared\Transfer\RabbitMqOptionTransfer
     */
    protected function createEventErrorQueueBinding()
    {
        $rabbitMqOptionTransfer = new RabbitMqOptionTransfer();
        $rabbitMqOptionTransfer->setQueueName(EventConstants::EVENT_QUEUE . '.error');
        $rabbitMqOptionTransfer->setAutoDelete(false);
        $rabbitMqOptionTransfer->setDurable(true);
        $rabbitMqOptionTransfer->setExclusive(false);
        $rabbitMqOptionTransfer->setPassive(false);
        $rabbitMqOptionTransfer->setRoutingKey('error');

        return $rabbitMqOptionTransfer;
    }

    /**
     * @return \Generated\Shared\Transfer\RabbitMqOptionTransfer
     */
    protected function createEventQueueBinding()
    {
        $rabbitMqOptionTransfer = new RabbitMqOptionTransfer();
        $rabbitMqOptionTransfer->setQueueName(EventConstants::EVENT_QUEUE);
        $rabbitMqOptionTransfer->setAutoDelete(false);
        $rabbitMqOptionTransfer->setDurable(true);
        $rabbitMqOptionTransfer->setExclusive(false);
        $rabbitMqOptionTransfer->setPassive(false);

        return $rabbitMqOptionTransfer;
    }
}
