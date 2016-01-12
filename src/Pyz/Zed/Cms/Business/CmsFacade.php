<?php

namespace Pyz\Zed\Cms\Business;

use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\Cms\Business\CmsFacade as SprykerCmsFacade;

/**
 * @method CmsBusinessFactory getFactory()
 */
class CmsFacade extends SprykerCmsFacade
{

    /**
     * @param MessengerInterface $messenger
     */
    public function installDemoData(MessengerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

}
