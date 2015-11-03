<?php

namespace Pyz\Zed\MailQueue\Business;

use Generated\Shared\Queue\QueueMessageInterface;
use Generated\Shared\Transfer\MailTransfer;
use SprykerEngine\Zed\Kernel\Business\AbstractFacade;

/**
 * @method MailQueueDependencyContainer getDependencyContainer()
 */
class MailQueueFacade extends AbstractFacade
{

    /**
     * @param QueueMessageInterface $queueMessage
     *
     * @return void
     */
    public function processEmailMessage(QueueMessageInterface $queueMessage)
    {
        $this->getDependencyContainer()
            ->createMailQueueManager()
            ->processMailMessage($queueMessage)
        ;
    }

    /**
     * @param MailTransfer $mailTransfer
     *
     * @return void
     */
    public function sendMail(MailTransfer $mailTransfer)
    {
        $this->getDependencyContainer()
            ->createMailFacade()
            ->sendMail($mailTransfer)
        ;
    }

    /**
     * @param MailTransfer $mailTransfer
     *
     * @return void
     */
    public function sendQueuedMail(MailTransfer $mailTransfer)
    {
        $this->getDependencyContainer()
            ->createMailQueueManager()
            ->sendQueuedMail($mailTransfer)
        ;
    }

}
