<?php

namespace Pyz\Zed\Cms\Business;


use SprykerEngine\Shared\Messenger\Business\Model\MessengerInterface;
use SprykerFeature\Zed\Cms\Business\CmsFacade as SprykerCmsFacade;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToCmsInterface;

/**
 * @method CmsDependencyContainer getDependencyContainer()
 */
class CmsFacade extends SprykerCmsFacade
{

    /**
     * @param MessengerInterface $messenger
     */
    public function installDemoData(MessengerInterface $messenger)
    {
        $this->getDependencyContainer()->createDemoDataInstaller($messenger)->install();
    }
}
