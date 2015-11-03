<?php

namespace Pyz\Zed\MailQueue\Communication\Console;

use Generated\Shared\Transfer\MailRecipientTransfer;
use Generated\Shared\Transfer\MailTransfer;
use Pyz\Zed\MailQueue\Business\MailQueueFacade;
use Pyz\Zed\MailQueue\Communication\MailQueueDependencyContainer;
use SprykerFeature\Zed\Console\Business\Model\Console;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method MailQueueFacade getFacade()
 * @method MailQueueDependencyContainer getDependencyContainer()
 */
class MailQueueConsole extends Console
{

    const QUEUE_NAME = 'sample_queue_email';
    const COMMAND_NAME = 'mailqueue:sample';
    const COMMAND_DESCRIPTION = 'send sample queued email';

    protected function configure()
    {
        $this->setName(self::COMMAND_NAME);
        $this->setDescription(self::COMMAND_DESCRIPTION);

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $mailTransfer = new MailTransfer();
        $mailRecipientTransfer = new MailRecipientTransfer();
        $mailRecipientTransfer->setEmail('test@demoshop');

        $mailTransfer->addRecipient($mailRecipientTransfer);
        $mailTransfer->setFromEmail('registration@demoshop');
        $mailTransfer->setSubject('Sample Registration E-mail');
        $mailTransfer->setTemplateName('MailQueue.email.registration');

        $this->getFacade()->sendQueuedMail($mailTransfer);
    }

    /**
     * @return string
     */
    protected function getQueueName()
    {
        return sprintf(
            '%s.%s',
            $this->getStoreId(),
            self::QUEUE_NAME
        );
    }

    /**
     * @return string
     */
    protected function getStoreId()
    {
        return $this->getDependencyContainer()
            ->getCurrentStore()
            ->getCurrentCountry();
    }

}
