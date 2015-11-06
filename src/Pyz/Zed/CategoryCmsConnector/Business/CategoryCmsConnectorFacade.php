<?php

namespace Pyz\Zed\CategoryCmsConnector\Business;

use SprykerEngine\Shared\Kernel\Messenger\MessengerInterface;
use SprykerEngine\Zed\Kernel\Business\AbstractFacade;

/**
 * @method CategoryCmsConnectorDependencyContainer getDependencyContainer
 */
class CategoryCmsConnectorFacade extends AbstractFacade
{

    public function installDemoData(MessengerInterface $messenger)
    {
        $this->getDependencyContainer()->createCategoryCmsInstaller($messenger)->install();
    }
}
