<?php

namespace Pyz\Zed\Cms\Business;

use Spryker\Zed\Cms\Business\CmsFacade as SprykerCmsFacade;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;

/**
 * @method \Pyz\Zed\Cms\Business\CmsBusinessFactory getFactory()
 */
class CmsFacade extends SprykerCmsFacade implements CmsFacadeInterface
{

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return void
     */
    public function installDemoData(MessengerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

}
