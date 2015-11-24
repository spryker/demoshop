<?php

namespace Pyz\Zed\CategoryCmsConnector\Communication\Plugin;

use Pyz\Zed\CategoryCmsConnector\Business\CategoryCmsConnectorFacade;
use SprykerFeature\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;

/**
 * @method CategoryCmsConnectorFacade getFacade()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    public function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }
}
