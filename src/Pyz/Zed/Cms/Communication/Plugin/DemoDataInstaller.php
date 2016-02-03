<?php

namespace Pyz\Zed\Cms\Communication\Plugin;

use Pyz\Zed\Cms\Business\CmsFacade;
use Pyz\Zed\Cms\Communication\CmsCommunicationFactory;
use Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;

/**
 * @method \Pyz\Zed\Cms\Communication\CmsCommunicationFactory getFactory()
 * @method \Pyz\Zed\Cms\Business\CmsFacade getFacade()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    public function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }

}
