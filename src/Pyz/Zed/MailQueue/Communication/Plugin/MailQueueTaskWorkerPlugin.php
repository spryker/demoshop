<?php

namespace Pyz\Zed\MailQueue\Communication\Plugin;

use Generated\Shared\Transfer\QueueMessageTransfer;
use Pyz\Zed\MailQueue\Communication\MailQueueCommunicationFactory;
use Pyz\Zed\MailQueue\Business\MailQueueFacade;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Queue\Dependency\Plugin\TaskPluginInterface;

/**
 * @method MailQueueCommunicationFactory getFactory()
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
