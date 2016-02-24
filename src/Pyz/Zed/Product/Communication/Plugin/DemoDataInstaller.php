<?php

namespace Pyz\Zed\Product\Communication\Plugin;

use Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;

/**
 * @method \Pyz\Zed\Product\Business\ProductFacade getFacade()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    /**
     * @return void
     */
    public function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }

}
