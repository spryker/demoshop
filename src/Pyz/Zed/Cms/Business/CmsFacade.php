<?php

namespace Pyz\Zed\Cms\Business;

use Psr\Log\LoggerInterface;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToCmsInterface;
use SprykerFeature\Zed\Cms\Business\CmsFacade as SprykerCmsFacade;

/**
 * @method CmsDependencyContainer getDependencyContainer()
 */
class CmsFacade extends SprykerCmsFacade 
{
    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getDependencyContainer()->createDemoDataInstaller($messenger)->install();
    }
}
