<?php

namespace Pyz\Zed\ProductGroup\Communication\Plugin;

use PavFeature\Zed\ProductGroup\Business\ProductGroupFacade;
use SprykerFeature\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;

/**
 * @method ProductGroupFacade getFacade()
 */

class DemoDataInstaller extends AbstractInstallerPlugin
{

    public function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }
}