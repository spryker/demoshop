<?php

namespace Pyz\Client\RabbitMq\Model\Publisher;

use Generated\Shared\Transfer\QueueMessageTransfer;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Message\AMQPMessage;

class Publisher implements PublisherInterface
{

    /**
     * @var \PhpAmqpLib\Channel\AMQPChannel
     */
    protected $channel;

    /**
     * Publisher constructor.
     *
     * @param AMQPChannel $channel
     */
    public function __construct(AMQPChannel $channel)
    {
        $this->channel = $channel;
    }

    /**
     * @param QueueMessageTransfer $messageTransfer
     *
     * @return void
     */
    public function sendMessage(QueueMessageTransfer $messageTransfer)
    {
        $message = $this->createMessage($messageTransfer);

        $this->publish($message, $messageTransfer->getQueueName(), $messageTransfer->getRoutingKey());
    }

    /**
     * @param string $queueName
     * @param \Generated\Shared\Transfer\QueueMessageTransfer[] $queueMessageTransfers
     *
     * @return void
     */
    public function sendMessages($queueName, array $queueMessageTransfers)
    {
        foreach ($queueMessageTransfers as $queueMessageTransfer) {
            $msg = new AMQPMessage($queueMessageTransfer->getBody());
            $this->channel->batch_basic_publish($msg, $queueName, $queueMessageTransfer->getRoutingKey());
        }

        $this->channel->publish_batch();
    }

    /**
     * @param AMQPMessage $message
     * @param string $exchangeQueue
     * @param string $routingKey
     *
     * @return void
     */
    protected function publish(AMQPMessage $message, $exchangeQueue, $routingKey)
    {
        $this->channel->basic_publish($message, $exchangeQueue, $routingKey);
    }

    /**
     * @param \Generated\Shared\Transfer\QueueMessageTransfer $messageTransfer
     *
     * @return \PhpAmqpLib\Message\AMQPMessage
     */
    protected function createMessage(QueueMessageTransfer $messageTransfer)
    {
        return new AMQPMessage($messageTransfer->getBody(), $this->getMessageConfig());
    }

    /**
     * @return array
     */
    protected function getMessageConfig()
    {
        return [];
    }
}
