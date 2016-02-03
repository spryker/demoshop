<?php

namespace Pyz\Zed\Product\Communication\Plugin;

use Pyz\Zed\Product\Business\ProductFacade;
use Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;

/**
 * @method \Pyz\Zed\Product\Business\ProductFacade getFacade()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    public function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }

}
