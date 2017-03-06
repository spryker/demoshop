<?php

namespace Pyz\Client\RabbitMq\Model\Consumer;

use Generated\Shared\Transfer\QueueMessageTransfer;
use Generated\Shared\Transfer\QueueOptionTransfer;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Message\AMQPMessage;

class Consumer implements ConsumerInterface
{

    const CONSUMER_TAG = 'consumerTag';
    const NO_LOCAL = 'noLocal';
    const NO_ACK = 'noAck';
    const EXCLUSIVE = 'exclusive';
    const NOWAIT = 'nowait';

    const QUEUE_LOG_FILE = 'queue.log';
    const DEFAULT_CONSUMER_TIMEOUT_SECONDS = 1;
    const DEFAULT_PREFETCH_COUNT = 100;

    /**
     * @var \PhpAmqpLib\Channel\AMQPChannel
     */
    protected $channel;

    /**
     * @var array
     */
    protected $collectedMessages = [];

    /**
     * @param AMQPChannel $channel
     */
    public function __construct(AMQPChannel $channel)
    {
        $this->channel = $channel;
    }

    /**
     * @param \Generated\Shared\Transfer\QueueOptionTransfer $queueOptionTransfer
     *
     * @return mixed
     */
    public function receiveMessages(QueueOptionTransfer $queueOptionTransfer)
    {
        $this->channel->basic_qos(null, $queueOptionTransfer->getChunkSize(), null);
        $this->channel->basic_consume(
            $queueOptionTransfer->getQueueName(),
            $queueOptionTransfer->getConsumerTag(),
            $queueOptionTransfer->getNoLocal(),
            $queueOptionTransfer->getNoAck(),
            $queueOptionTransfer->getConsumerExclusive(),
            $queueOptionTransfer->getNoWait(),
            [$this, 'collectQueueMessages']
        );

        try {
            $finished = false;
            while (count($this->channel->callbacks) && !$finished) {
                $this->channel->wait(null, false, self::DEFAULT_CONSUMER_TIMEOUT_SECONDS);
            }
        } catch (\Exception $e) {
            $finished = true;
        }

        return $this->collectedMessages;
    }

    /**
     * @param AMQPMessage $message
     *
     * @return void
     */
    public function collectQueueMessages(AMQPMessage $message)
    {
        $queueMessageTransfer = new QueueMessageTransfer();
        $queueMessageTransfer->setBody($message->getBody());
        $queueMessageTransfer->setDeliveryTag($message->delivery_info['delivery_tag']);

        $this->collectedMessages[] = $queueMessageTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QueueMessageTransfer $queueMessageTransfer
     *
     * @return void
     */
    public function acknowledge(QueueMessageTransfer $queueMessageTransfer)
    {
        $this->channel->basic_ack($queueMessageTransfer->getDeliveryTag());
    }

    /**
     * @param QueueMessageTransfer $queueMessageTransfer
     *
     * @return mixed
     */
    public function handleError(QueueMessageTransfer $queueMessageTransfer)
    {
        //TODO send it to QueueError
    }

    /**
     * @param QueueOptionTransfer $queueOptionTransfer
     *
     * @return QueueMessageTransfer
     */
    public function receiveMessage(QueueOptionTransfer $queueOptionTransfer)
    {
        // TODO: Implement receiveMessage() method.
    }
}
