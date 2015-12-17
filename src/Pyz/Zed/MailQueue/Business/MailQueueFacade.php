<?php

namespace Pyz\Zed\MailQueue\Business;

use Generated\Shared\Transfer\MailTransfer;
use Generated\Shared\Transfer\QueueMessageTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method MailQueueBusinessFactory getFactory()
 */
class MailQueueFacade extends AbstractFacade
{

    /**
     * @param QueueMessageTransfer $queueMessage
     *
     * @return void
     */
    public function processEmailMessage(QueueMessageTransfer $queueMessage)
    {
        $this->getFactory()
            ->createMailQueueManager()
            ->processMailMessageFromQueue($queueMessage);
    }

    /**
     * @param MailTransfer $mailTransfer
     *
     * @return void
     */
    public function sendEmailToQueue(MailTransfer $mailTransfer)
    {
        $this->getFactory()
            ->createMailQueueManager()
            ->sendEmailToQueue($mailTransfer);
    }

    /**
     * @param MailTransfer $mailTransfer
     *
     * @return array
     */
    public function sendMail(MailTransfer $mailTransfer)
    {
        return $this->getFactory()
            ->createMailFacade()
            ->sendMail($mailTransfer);
    }

    /**
     * @param string $queueName
     * @param QueueMessageTransfer $queueMessage
     *
     * @return void
     */
    public function publishMessage($queueName, QueueMessageTransfer $queueMessage)
    {
        $this->getFactory()
            ->createQueueFacade()
            ->publishMessage($queueName, $queueMessage);
    }

    /**
     * @return string
     */
    public function getQueueName()
    {
        return sprintf(
            '%s.%s',
            $this->getFactory()->getCurrentStore()->getCurrentCountry(),
            'mail.queue'
        );
    }

}
