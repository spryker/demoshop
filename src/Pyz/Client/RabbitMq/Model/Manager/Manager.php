<?php
/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Client\RabbitMq\Model\Manager;

use Generated\Shared\Transfer\QueueMessageTransfer;
use Generated\Shared\Transfer\QueueOptionTransfer;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Message\AMQPMessage;
use Pyz\Client\RabbitMq\Model\Helper\QueueEstablishmentHelperInterface;

class Manager implements ManagerInterface
{

    /**
     * @var AMQPChannel
     */
    protected $channel;

    /**
     * @var QueueEstablishmentHelperInterface
     */
    protected $queueEstablishmentHelper;

    /**
     * @param AMQPChannel $channel
     * @param QueueEstablishmentHelperInterface $queueEstablishmentHelper
     */
    public function __construct(AMQPChannel $channel, QueueEstablishmentHelperInterface $queueEstablishmentHelper)
    {
        $this->channel = $channel;
        $this->queueEstablishmentHelper = $queueEstablishmentHelper;
    }

    /**
     * @param \Generated\Shared\Transfer\QueueOptionTransfer $queueOptionTransfer
     *
     * @return mixed
     */
    public function createQueue(QueueOptionTransfer $queueOptionTransfer)
    {
        $this->queueEstablishmentHelper->createQueue($this->channel, $queueOptionTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\QueueOptionTransfer $queueOptionTransfer
     *
     * @return mixed
     */
    public function createExchange(QueueOptionTransfer $queueOptionTransfer)
    {
        $this->queueEstablishmentHelper->createExchange($this->channel, $queueOptionTransfer);
    }

    /**
     * @param QueueMessageTransfer $queueMessageTransfer
     *
     * @return QueueMessageTransfer
     */
    public function handleErrorMessage(QueueMessageTransfer $queueMessageTransfer)
    {
        $message = new AMQPMessage($queueMessageTransfer->getBody());
        $this->channel->basic_publish($message, $queueMessageTransfer->getQueueName(), 'error');

        return $queueMessageTransfer;
    }

    /**
     * @param string $queueName
     *
     * @return void
     */
    public function deleteQueue($queueName)
    {
        $this->channel->queue_delete($queueName);
    }

    /**
     * @param string $queueName
     *
     * @return void
     */
    public function purgeQueue($queueName)
    {
        $this->channel->queue_purge($queueName);
    }
}
