<?php

namespace Pyz\Zed\CustomerMailQueueConnector\Business;

use PavFeature\Zed\MailQueue\Business\MailQueueFacade;
use Generated\Shared\Transfer\MailTransfer;
use Generated\Shared\Transfer\MailRecipientTransfer;

class EmailSender
{
    /**
     * @var MailQueueFacade
     */
    protected $mailQueueFacade;

    /**
     * @var string
     */
    protected $templateName;

    /**
     * @var string
     */
    protected $subject;

    /**
     * @var string
     */
    protected $fromEmail;

    /**
     * @var string
     */
    protected $fromName;

    /**
     * @param MailQueueFacade $mailQueueFacade
     * @param string $templateName
     * @param string $subject
     * @param string $fromEmail
     * @param string $fromName
     */
    public function __construct(
        MailQueueFacade $mailQueueFacade,
        $templateName,
        $subject,
        $fromEmail,
        $fromName
    ) {
        $this->mailQueueFacade = $mailQueueFacade;
        $this->templateName = $templateName;
        $this->subject = $subject;
        $this->fromEmail = $fromEmail;
        $this->fromName = $fromName;
    }

    /**
     * @param string $email
     */
    public function send($email)
    {
        $mailTransfer = new MailTransfer();
        $mailTransfer->setTemplateName($this->templateName);
        $mailTransfer->setSubject($this->subject);
        $mailTransfer->setFromEmail($this->fromEmail);
        $mailTransfer->setFromName($this->fromName);

        $mailRecipientTransfer = new MailRecipientTransfer();
        $mailRecipientTransfer->setEmail($email);

        $mailTransfer->addRecipient($mailRecipientTransfer);

        $this->mailQueueFacade->addMailTransferToQueue($mailTransfer);
    }
}
