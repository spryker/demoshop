<?php

namespace Pyz\Zed\Cms\Communication\Plugin;

use Pyz\Zed\Cms\Business\CmsFacade;
use Pyz\Zed\Cms\Communication\CmsCommunicationFactory;
use Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;

/**
 * @method CmsCommunicationFactory getCommunicationFactory()
 * @method CmsFacade getFacade()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    public function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }

}
