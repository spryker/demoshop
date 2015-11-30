<?php

namespace Pyz\Zed\MailQueue\Business\Model;

use Generated\Shared\Transfer\MailTransfer;
use Generated\Shared\Transfer\QueueMessageTransfer;
use Pyz\Zed\MailQueue\Business\MailQueueFacade;

class MailQueueManager implements MailQueueManagerInterface
{

    /**
     * @var MailQueueFacade
     */
    protected $mailQueueFacade;

    /**
     * @param MailQueueFacade $mailQueueFacade
     */
    public function __construct(MailQueueFacade $mailQueueFacade)
    {
        $this->mailQueueFacade = $mailQueueFacade;
    }

    /**
     * @param QueueMessageTransfer $queueMessage
     *
     * @return void
     */
    public function processMailMessageFromQueue(QueueMessageTransfer $queueMessage)
    {
        $mailTransfer = (new MailTransfer())
            ->fromArray($queueMessage->getPayload());

        $this->mailQueueFacade->sendMail($mailTransfer);
    }

    /**
     * @param MailTransfer $mailTransfer
     *
     * @return void
     */
    public function sendEmailToQueue(MailTransfer $mailTransfer)
    {
        $queueName = $this->mailQueueFacade->getQueueName();

        $queueMessage = new QueueMessageTransfer();
        $queueMessage->setPayload($mailTransfer->toArray());

        $this->mailQueueFacade->publishMessage($queueName, $queueMessage);
    }

}
