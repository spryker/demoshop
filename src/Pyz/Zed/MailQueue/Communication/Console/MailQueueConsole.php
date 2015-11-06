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
        $mailRecipientTransfer->setEmail('info@spryker.com');

        $mailTransfer->addRecipient($mailRecipientTransfer);
        $mailTransfer->setFromEmail('service@demoshop.de');
        $mailTransfer->setSubject('Sample Registration E-mail');
        $mailTransfer->setTemplateName('template_test');
        $mailTransfer->setTemplateContent(['CONTENT1' => 'test1', 'CONTENT' => 'test2']);

        $this->getFacade()->sendEmailToQueue($mailTransfer);
    }

}
