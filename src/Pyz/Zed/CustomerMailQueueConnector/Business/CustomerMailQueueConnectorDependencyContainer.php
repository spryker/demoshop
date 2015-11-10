<?php

namespace Pyz\Zed\CustomerMailQueueConnector\Business;

use Pyz\Zed\CustomerMailQueueConnector\CustomerMailQueueConnectorDependencyProvider;
use PavFeature\Zed\MailQueue\Business\MailQueueFacade;
use Generated\Zed\Ide\FactoryAutoCompletion\CustomerMailQueueConnectorBusiness;
use SprykerEngine\Zed\Kernel\Business\AbstractBusinessDependencyContainer;

/**
 * @method CustomerMailQueueConnectorBusiness getFactory()
 */
class CustomerMailQueueConnectorDependencyContainer extends AbstractBusinessDependencyContainer
{
    /**
     * @return TokenSender
     */
    public function createRegistrationTokenSender()
    {
        return $this->getFactory()->createTokenSender(
            $this->createMailQueueFacade(),
            $this->getConfig()->getRegistrationTokenTemplateName(),
            $this->getConfig()->getRegistrationTokenSubject(),
            $this->getConfig()->getSenderFromEmail(),
            $this->getConfig()->getSenderFromName()
        );
    }

    /**
     * @return TokenSender
     */
    public function createRestoreTokenSender()
    {
        return $this->getFactory()->createTokenSender(
            $this->createMailQueueFacade(),
            $this->getConfig()->getRestoreTokenTemplateName(),
            $this->getConfig()->getRestoreTokenSubject(),
            $this->getConfig()->getSenderFromEmail(),
            $this->getConfig()->getSenderFromName()
        );
    }

    /**
     * @return EmailSender
     */
    public function createRestoreConfirmationSender()
    {
        return $this->getFactory()->createEmailSender(
            $this->createMailQueueFacade(),
            $this->getConfig()->getRestoreConfirmationTemplateName(),
            $this->getConfig()->getRestoreConfirmationSubject(),
            $this->getConfig()->getSenderFromEmail(),
            $this->getConfig()->getSenderFromName()
        );
    }

    /**
     * @return MailQueueFacade
     */
    protected function createMailQueueFacade()
    {
        return $this->getProvidedDependency(CustomerMailQueueConnectorDependencyProvider::FACADE_MAIL_QUEUE);
    }
}
