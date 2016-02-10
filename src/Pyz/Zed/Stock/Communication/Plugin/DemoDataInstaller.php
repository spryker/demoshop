<?php

namespace Pyz\Zed\Stock\Communication\Plugin;

use Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;

/**
 * @method \Pyz\Zed\Stock\Business\StockFacade getFacade()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    public function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }

}
