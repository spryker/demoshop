<?php

namespace Pyz\Zed\MailQueue\Communication\Plugin;

use Generated\Shared\Transfer\QueueMessageTransfer;
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
        return $this->getFacade()->getQueueName();
    }

    /**
     * @param QueueMessageTransfer $queueMessage
     */
    public function run(QueueMessageTransfer $queueMessage)
    {
        $this->getFacade()->processEmailMessage($queueMessage);
    }

}
