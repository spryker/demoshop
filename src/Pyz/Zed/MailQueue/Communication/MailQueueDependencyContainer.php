<?php

namespace Pyz\Zed\MailQueue\Communication;

use SprykerEngine\Shared\Kernel\Store;
use SprykerEngine\Zed\Kernel\Communication\AbstractCommunicationDependencyContainer;

class MailQueueDependencyContainer extends AbstractCommunicationDependencyContainer
{

    /**
     * @return Store
     */
    public function getCurrentStore()
    {
        return Store::getInstance();
    }

}
