<?php

namespace Pyz\Zed\MailQueue\Business\Model;

use Generated\Shared\Transfer\QueueMessageTransfer;
use Generated\Shared\Transfer\MailTransfer;

interface MailQueueManagerInterface
{

    /**
     * @param QueueMessageTransfer $queueMessage
     */
    public function processMailMessageFromQueue(QueueMessageTransfer $queueMessage);

    /**
     * @param MailTransfer $mailTransfer
     *
     * @return void
     */
    public function sendEmailToQueue(MailTransfer $mailTransfer);

}
