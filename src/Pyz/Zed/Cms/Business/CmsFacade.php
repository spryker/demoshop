<?php

namespace Pyz\Zed\Cms\Business;

use Spryker\Shared\Kernel\Messenger\MessengerInterface;
use Spryker\Zed\Cms\Business\CmsFacade as SprykerCmsFacade;
use Spryker\Zed\ProductCategory\Dependency\Facade\CmsToCategoryInterface;

/**
 * @method CmsBusinessFactory getFactory()
 */
class CmsFacade extends SprykerCmsFacade implements CmsToCategoryInterface
{

    /**
     * @param MessengerInterface $messenger
     */
    public function installDemoData(MessengerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

}
