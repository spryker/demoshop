<?php

namespace Pyz\Zed\MailQueue\Business;

use Pyz\Zed\MailQueue\Business\Model\MailQueueManager;
use Generated\Zed\Ide\FactoryAutoCompletion\MailQueueBusiness;
use Pyz\Zed\MailQueue\Business\Model\MailQueueManagerInterface;
use Pyz\Zed\MailQueue\MailQueueDependencyProvider;
use Pyz\Zed\Queue\Business\QueueFacade;
use SprykerEngine\Shared\Kernel\Store;
use SprykerEngine\Zed\Kernel\Business\AbstractBusinessDependencyContainer;
use SprykerFeature\Zed\Mail\Business\MailFacade;

/**
 * @method MailQueueBusiness getFactory()
 */
class MailQueueDependencyContainer extends AbstractBusinessDependencyContainer
{

    /**
     * @return MailQueueManagerInterface
     */
    public function createMailQueueManager()
    {
        return new MailQueueManager(
            $this->createMailQueueFacade()
        );
    }

    /**
     * @throws \ErrorException
     *
     * @return MailFacade
     */
    public function createMailFacade()
    {
        return $this->getProvidedDependency(MailQueueDependencyProvider::MAIL_FACADE);
    }

    /**
     * @throws \ErrorException
     *
     * @return QueueFacade
     */
    public function createQueueFacade()
    {
        return $this->getProvidedDependency(MailQueueDependencyProvider::QUEUE_FACADE);
    }

    /**
     * @throws \ErrorException
     *
     * @return MailQueueFacade
     */
    public function createMailQueueFacade()
    {
        return $this->getProvidedDependency(MailQueueDependencyProvider::MAIL_QUEUE_FACADE);
    }

    /**
     * @return Store
     */
    public function getCurrentStore()
    {
        return Store::getInstance();
    }

}
