<?php

namespace Pyz\Client\RabbitMq\Model;

use Generated\Shared\Transfer\QueueMessageTransfer;
use Generated\Shared\Transfer\QueueOptionTransfer;
use Pyz\Client\RabbitMq\Model\Consumer\ConsumerInterface;
use Pyz\Client\RabbitMq\Model\Manager\ManagerInterface;
use Pyz\Client\RabbitMq\Model\Publisher\PublisherInterface;
use Spryker\Client\Queue\Model\Adapter\AdapterInterface;

class Adapter implements AdapterInterface
{

    /**
     * @var \Pyz\Client\RabbitMq\Model\Manager\ManagerInterface
     */
    protected $manager;

    /**
     * @var \Pyz\Client\RabbitMq\Model\Publisher\PublisherInterface
     */
    protected $publisher;

    /**
     * @var \Pyz\Client\RabbitMq\Model\Consumer\ConsumerInterface
     */
    protected $consumer;

    /**
     * @param ManagerInterface $manager
     * @param PublisherInterface $publisher
     * @param ConsumerInterface $consumer
     */
    public function __construct(
        ManagerInterface $manager,
        PublisherInterface $publisher,
        ConsumerInterface $consumer
    ) {
        $this->manager = $manager;
        $this->publisher = $publisher;
        $this->consumer = $consumer;
    }

    /**
     * @param \Generated\Shared\Transfer\QueueOptionTransfer $queueOptionTransfer
     *
     * @return QueueOptionTransfer
     */
    public function createQueue(QueueOptionTransfer $queueOptionTransfer)
    {
        return $this->manager->createQueue($queueOptionTransfer);
    }

    /**
     * @param QueueOptionTransfer $queueOptionTransfer
     *
     * @return QueueOptionTransfer[]
     */
    public function receiveMessages(QueueOptionTransfer $queueOptionTransfer)
    {
        return $this->consumer->receiveMessages($queueOptionTransfer);
    }

    /**
     * @param QueueOptionTransfer $queueOptionTransfer
     *
     * @return QueueMessageTransfer
     */
    public function receiveMessage(QueueOptionTransfer $queueOptionTransfer)
    {
        return $this->consumer->receiveMessage($queueOptionTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\QueueMessageTransfer $queueMessageTransfer
     *
     * @return void
     */
    public function sendMessage(QueueMessageTransfer $queueMessageTransfer)
    {
        $this->publisher->sendMessage($queueMessageTransfer);
    }

    /**
     * @param string $queueName
     * @param \Generated\Shared\Transfer\QueueMessageTransfer[] $queueMessageTransfers
     *
     * @return void
     */
    public function sendMessages($queueName, array $queueMessageTransfers)
    {
        $this->publisher->sendMessages($queueName, $queueMessageTransfers);
    }

    /**
     * @param \Generated\Shared\Transfer\QueueMessageTransfer $queueMessageTransfer
     *
     * @return bool
     */
    public function acknowledge(QueueMessageTransfer $queueMessageTransfer)
    {
        return $this->consumer->acknowledge($queueMessageTransfer);
    }

    /**
     * @param QueueMessageTransfer $queueMessageTransfer
     *
     * @return QueueMessageTransfer
     */
    public function handleErrorMessage(QueueMessageTransfer $queueMessageTransfer)
    {
        $this->manager->handleErrorMessage($queueMessageTransfer);
    }

    /**
     * @param string $queueName
     *
     * @return bool
     */
    public function purgeQueue($queueName)
    {
        return $this->manager->purgeQueue($queueName);
    }

    /**
     * @param string $queueName
     *
     * @return bool
     */
    public function deleteQueue($queueName)
    {
        return $this->manager->deleteQueue($queueName);
    }
}
