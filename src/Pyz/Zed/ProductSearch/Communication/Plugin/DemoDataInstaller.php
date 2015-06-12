<?php

namespace Pyz\Zed\ProductSearch\Communication\Plugin;

use Pyz\Zed\ProductSearch\Business\ProductSearchFacade;
use SprykerFeature\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;

/**
 * @method ProductSearchFacade getFacade()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    public function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }

}
