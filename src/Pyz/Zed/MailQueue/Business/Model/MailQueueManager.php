<?php

namespace Pyz\Zed\MailQueue\Business\Model;

use Generated\Shared\Queue\QueueMessageInterface;
use Generated\Shared\Transfer\MailTransfer;
use Generated\Shared\Transfer\QueueMessageTransfer;
use Pyz\Zed\MailQueue\Business\MailQueueFacade;
use Pyz\Zed\MailQueue\MailQueueConfig;

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
     * @param QueueMessageInterface $queueMessage
     *
     * @return void
     */
    public function processMailMessageFromQueue(QueueMessageInterface $queueMessage)
    {
        $mailTransfer = $queueMessage->getPayload();

        die(dump('processMailMessage', $mailTransfer));
        $this->mailQueueFacade->sendMail($mailTransfer);
    }

    /**
     * @param MailTransfer $mailTransfer
     *
     * @return void
     */
    public function sendEmailToQueue(MailTransfer $mailTransfer)
    {
        $queueMessage = new QueueMessageTransfer();
        $queueMessage->setPayload($mailTransfer->toArray());

        $this->mailQueueFacade->publishMessage(MailQueueConfig::QUEUE_NAME, $queueMessage);
    }

}
