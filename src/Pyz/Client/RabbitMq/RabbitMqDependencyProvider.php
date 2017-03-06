<?php

namespace Pyz\Client\RabbitMq;

use Generated\Shared\Transfer\QueueConnectionTransfer;
use Generated\Shared\Transfer\QueueOptionTransfer;
use Spryker\Client\Kernel\AbstractDependencyProvider;
use Pyz\Client\RabbitMq\Model\Connection\Connection;
use Pyz\Shared\RabbitMq\RabbitMqConstants;
use Spryker\Client\Kernel\Container;
use Spryker\Shared\Config\Config;

class RabbitMqDependencyProvider extends AbstractDependencyProvider
{

    const QUEUE_CONNECTION = 'queue connection config';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container)
    {
        $container[static::QUEUE_CONNECTION] = function () {
            return $this->getQueueConnection();
        };

        return $container;
    }

    /**
     * @return \Generated\Shared\Transfer\QueueConnectionTransfer
     */
    public function getQueueConnection()
    {
        $queueConfig = $this->getQueueConnectionConfig();

        $connectionTransfer = new QueueConnectionTransfer();
        $connectionTransfer->setHost($queueConfig['host']);
        $connectionTransfer->setPort($queueConfig['port']);
        $connectionTransfer->setUsername($queueConfig['username']);
        $connectionTransfer->setPassword($queueConfig['password']);
        $connectionTransfer->setVirtualHost($queueConfig['virtualHost']);

        $connectionTransfer->setQueueOptionCollection($this->getQueueOptions());

        return $connectionTransfer;
    }

    /**
     * @return \ArrayObject
     */
    protected function getQueueOptions()
    {
        $queueOptionCollection = new \ArrayObject();
        $queueOptionCollection->append($this->createMailExchangeQueueOption());
        $queueOptionCollection->append($this->createMailErrorExchangeQueueOption());

        return $queueOptionCollection;
    }

    /**
     * @return \Generated\Shared\Transfer\QueueOptionTransfer
     */
    protected function createMailExchangeQueueOption()
    {
        $queueOption = new QueueOptionTransfer();
        $queueOption->setQueueName('Mail');
        $queueOption->setAutoDelete(false);
        $queueOption->setDurable(true);
        $queueOption->setPassive(false);
        $queueOption->setType('direct');
        $queueOption->setDeclarationType(Connection::RABBIT_MQ_EXCHANGE);
        $queueOption->setBindingQueue($this->createMailQueueBinding());

        return $queueOption;
    }

    /**
     * @return \Generated\Shared\Transfer\QueueOptionTransfer
     */
    protected function createMailErrorExchangeQueueOption()
    {
        $queueOption = new QueueOptionTransfer();
        $queueOption->setQueueName('Mail');
        $queueOption->setAutoDelete(false);
        $queueOption->setDurable(true);
        $queueOption->setPassive(false);
        $queueOption->setType('direct');
        $queueOption->setDeclarationType(Connection::RABBIT_MQ_EXCHANGE);
        $queueOption->setBindingQueue($this->createMailErrorQueueBinding());

        return $queueOption;
    }

    /**
     * @return \Generated\Shared\Transfer\QueueOptionTransfer
     */
    protected function createMailQueueBinding()
    {
        $queueOption = new QueueOptionTransfer();
        $queueOption->setQueueName('Mail');
        $queueOption->setAutoDelete(false);
        $queueOption->setDurable(true);
        $queueOption->setExclusive(false);
        $queueOption->setPassive(false);

        return $queueOption;
    }

    /**
     * @return \Generated\Shared\Transfer\QueueOptionTransfer
     */
    protected function createMailErrorQueueBinding()
    {
        $queueOption = new QueueOptionTransfer();
        $queueOption->setQueueName('Mail.Error');
        $queueOption->setAutoDelete(false);
        $queueOption->setDurable(true);
        $queueOption->setExclusive(false);
        $queueOption->setPassive(false);
        $queueOption->setRoutingKey('error');

        return $queueOption;
    }

    /**
     * @param string $key
     *
     * @return string
     */
    public function getConfig($key)
    {
        return Config::get($key);
    }

    /**
     * @return array
     */
    protected function getQueueConnectionConfig()
    {
        return [
          'host' => $this->getConfig(RabbitMqConstants::QUEUE_HOST),
          'port' => $this->getConfig(RabbitMqConstants::QUEUE_PORT),
          'username' => $this->getConfig(RabbitMqConstants::QUEUE_USERNAME),
          'password' => $this->getConfig(RabbitMqConstants::QUEUE_PASSWORD),
          'virtualHost' => $this->getConfig(RabbitMqConstants::QUEUE_VIRTUAL_HOST),
        ];
    }

}
