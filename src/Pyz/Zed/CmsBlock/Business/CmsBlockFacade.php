<?php

namespace Pyz\Zed\CmsBlock\Business;

use SprykerEngine\Shared\Kernel\Messenger\MessengerInterface;
use PavFeature\Zed\CmsBlock\Business\CmsBlockFacade as PavFeatureCmsBlockFacade;

/**
 * @method CmsBlockDependencyContainer getDependencyContainer
 */
class CmsBlockFacade extends PavFeatureCmsBlockFacade
{

    public function installDemoData(MessengerInterface $messenger)
    {
        $this->getDependencyContainer()->createCmsBlockInstaller($messenger)->install();
    }

}
