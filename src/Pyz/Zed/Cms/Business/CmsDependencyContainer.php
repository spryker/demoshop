<?php

namespace Pyz\Zed\Cms\Business;

use Psr\Log\LoggerInterface;
use Pyz\Zed\Cms\Business\Internal\DemoData\CmsInstall;
use SprykerFeature\Zed\Cms\Business\CmsDependencyContainer as SprykerCmsDependencyContainer;

class CmsDependencyContainer extends SprykerCmsDependencyContainer
{
    /**
     * @param LoggerInterface $messenger
     *
     * @return CmsInstall
     */
    public function createDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = $this->getFactory()->createInternalDemoDataCmsInstall($this->getLocator());
        $installer->setMessenger($messenger);

        return $installer;
    }
}
