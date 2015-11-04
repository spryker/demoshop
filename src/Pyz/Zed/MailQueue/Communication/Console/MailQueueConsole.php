<?php

namespace Pyz\Zed\MailQueue\Communication\Console;

use Generated\Shared\Transfer\MailRecipientTransfer;
use Generated\Shared\Transfer\MailTransfer;
use Pyz\Zed\MailQueue\Business\MailQueueFacade;
use Pyz\Zed\MailQueue\Communication\MailQueueDependencyContainer;
use Pyz\Zed\MailQueue\MailQueueConfig;
use SprykerFeature\Zed\Console\Business\Model\Console;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method MailQueueFacade getFacade()
 * @method MailQueueDependencyContainer getDependencyContainer()
 */
class MailQueueConsole extends Console
{

    const COMMAND_NAME = 'mailqueue:registration:send';
    const COMMAND_DESCRIPTION = 'Send sample registration email using Queue';

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
        //$mailRecipientTransfer->setEmail('test@demoshop');
        $mailRecipientTransfer->setEmail('oliwier.ptak@spryker.com');

        $mailTransfer->addRecipient($mailRecipientTransfer);
        $mailTransfer->setFromEmail('registration@demoshop');
        $mailTransfer->setSubject('Sample Registration E-mail');
        $mailTransfer->setTemplateName('MailQueue.email.registration');

        $this->getFacade()->sendEmailToQueue($mailTransfer);
    }

    /**
     * @return string
     */
    protected function getQueueName()
    {
        return MailQueueConfig::QUEUE_NAME;
    }

}
