<?php

namespace Pyz\Zed\MailQueue\Business;

use Generated\Shared\Transfer\MailTransfer;
use Generated\Shared\Transfer\QueueMessageTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method MailQueueBusinessFactory getBusinessFactory()
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
        $this->getBusinessFactory()
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
        $this->getBusinessFactory()
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
        return $this->getBusinessFactory()
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
        $this->getBusinessFactory()
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
            $this->getBusinessFactory()->getCurrentStore()->getCurrentCountry(),
            'mail.queue'
        );
    }

}
