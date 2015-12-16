<?php

namespace Pyz\Zed\MailQueue\Business;

use Pyz\Zed\MailQueue\Business\Model\MailQueueManager;
use Pyz\Zed\MailQueue\Business\Model\MailQueueManagerInterface;
use Pyz\Zed\MailQueue\MailQueueDependencyProvider;
use Pyz\Zed\Queue\Business\QueueFacade;
use Spryker\Shared\Kernel\Store;
use Spryker\Zed\Kernel\Business\AbstractBusinessBusinessFactory;
use Spryker\Zed\Mail\Business\MailFacade;

class MailQueueBusinessFactory extends AbstractBusinessBusinessFactory
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
        return $this->getProvidedDependency(MailQueueDependencyProvider::FACADE_MAIL);
    }

    /**
     * @throws \ErrorException
     *
     * @return QueueFacade
     */
    public function createQueueFacade()
    {
        return $this->getProvidedDependency(MailQueueDependencyProvider::FACADE_QUEUE);
    }

    /**
     * @throws \ErrorException
     *
     * @return MailQueueFacade
     */
    public function createMailQueueFacade()
    {
        return $this->getProvidedDependency(MailQueueDependencyProvider::FACADE_MAIL_QUEUE);
    }

    /**
     * @return Store
     */
    public function getCurrentStore()
    {
        return Store::getInstance();
    }

}
