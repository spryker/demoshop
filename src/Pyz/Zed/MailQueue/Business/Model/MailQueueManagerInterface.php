<?php

namespace Pyz\Zed\MailQueue\Business\Model;

use Generated\Shared\Queue\QueueMessageInterface;
use Generated\Shared\Transfer\MailTransfer;

interface MailQueueManagerInterface
{

    /**
     * @param QueueMessageInterface $queueMessage
     */
    public function processMailMessage(QueueMessageInterface $queueMessage);

    /**
     * @param MailTransfer $mailTransfer
     *
     * @return void
     */
    public function sendQueuedMail(MailTransfer $mailTransfer);

}
