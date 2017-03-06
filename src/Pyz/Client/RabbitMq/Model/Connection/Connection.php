<?php

namespace Pyz\Client\RabbitMq\Model\Connection;

use Generated\Shared\Transfer\QueueOptionTransfer;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use Pyz\Client\RabbitMq\Model\Helper\QueueEstablishmentHelperInterface;

class Connection implements ConnectionInterface
{

    const RABBIT_MQ_EXCHANGE = 'exchange';

    /**
     * @var \Generated\Shared\Transfer\QueueOptionTransfer[]
     */
    protected $queueOptionCollection;

    /**
     * @var \PhpAmqpLib\Connection\AMQPStreamConnection
     */
    protected $streamConnection;

    /**
     * @var \PhpAmqpLib\Channel\AMQPChannel
     */
    protected $channel;

    /**
     * @var QueueEstablishmentHelperInterface
     */
    protected $queueEstablishmentHelper;

    /**
     * @param AMQPStreamConnection $streamConnection
     * @param QueueEstablishmentHelperInterface $queueEstablishmentHelper
     * @param \ArrayObject $queueOptionCollection
     */
    public function __construct(
        AMQPStreamConnection $streamConnection,
        QueueEstablishmentHelperInterface $queueEstablishmentHelper,
        \ArrayObject $queueOptionCollection)
    {
        $this->streamConnection = $streamConnection;
        $this->queueEstablishmentHelper = $queueEstablishmentHelper;
        $this->queueOptionCollection = $queueOptionCollection;

        $this->setupConnection();
    }

    /**
     * @return \PhpAmqpLib\Channel\AMQPChannel
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @return void
     */
    protected function setupConnection()
    {
        $this->channel = $this->streamConnection->channel();

        $this->setupQueueAndExchange();
    }

    /**
     * @return void
     */
    protected function setupQueueAndExchange()
    {
        foreach ($this->queueOptionCollection as $queueOption) {
            if ($queueOption->getDeclarationType() !== self::RABBIT_MQ_EXCHANGE) {
                $this->queueEstablishmentHelper->createQueue($this->channel, $queueOption);

                continue;
            }

            $this->queueEstablishmentHelper->createExchange($this->channel, $queueOption);
            if ($queueOption->getBindingQueue() !== null) {
                $this->createQueueAndBind($queueOption->getBindingQueue(), $queueOption->getQueueName());
            }
        }
    }


    /**
     * @param string $exchangeQueueName
     * @param \Generated\Shared\Transfer\QueueOptionTransfer $queueOption
     *
     * @return void
     */
    protected function createQueueAndBind(QueueOptionTransfer $queueOption, $exchangeQueueName)
    {
        $this->queueEstablishmentHelper->createQueue($this->channel, $queueOption);

        $this->bindQueues($queueOption->getQueueName(), $exchangeQueueName, $queueOption->getRoutingKey());
    }

    /**
     * @param string $queueName
     * @param string $exchangeName
     * @param string $routingKey
     *
     * @return void
     */
    protected function bindQueues($queueName, $exchangeName, $routingKey = '')
    {
        $this->channel->queue_bind($queueName, $exchangeName, $routingKey);
    }

    /**
     * @return void
     */
    public function close()
    {
        if ($this->channel === null) {
            return;
        }

        $this->channel->close();
        $this->streamConnection->close();
    }

    public function __destruct()
    {
        $this->close();
    }
}
