<?php

namespace Pyz\Zed\MailQueue\Communication\Plugin;

use Generated\Shared\Queue\QueueMessageInterface;
use Pyz\Zed\MailQueue\Communication\MailQueueDependencyContainer;
use Pyz\Zed\MailQueue\Business\MailQueueFacade;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Queue\Dependency\Plugin\TaskPluginInterface;

/**
 * @method MailQueueDependencyContainer getDependencyContainer()
 * @method MailQueueFacade getFacade()
 */
class MailQueueTaskWorkerPlugin extends AbstractPlugin implements
    TaskPluginInterface
{

    const REGISTRATION_EMAIL = 'registration_email';

    /**
     * @return string
     */
    public function getName()
    {
        return 'mailQueue.worker';
    }

    /**
     * @return string
     */
    public function getQueueName()
    {
        return sprintf(
            '%s.%s',
            $this->getStoreId(),
            self::REGISTRATION_EMAIL
        );
    }

    /**
     * @param QueueMessageInterface $queueMessage
     */
    public function run(QueueMessageInterface $queueMessage)
    {
        $this->getFacade()->processEmailMessage($queueMessage);
    }

    /**
     * @return string
     */
    protected function getStoreId()
    {
        return $this->getDependencyContainer()
            ->getCurrentStore()
            ->getCurrentCountry()
        ;
    }

}
