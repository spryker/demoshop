<?php

namespace Pyz\Zed\MailQueue\Business\Model;

use Generated\Shared\Queue\QueueMessageInterface;
use Generated\Shared\Transfer\MailTransfer;
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
     * @param QueueMessageInterface $queueMessage
     *
     * @return void
     */
    public function processMailMessage(QueueMessageInterface $queueMessage)
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
    public function sendQueuedMail(MailTransfer $mailTransfer)
    {
        die(dump('sendQueuedMail', $mailTransfer));
    }

}
