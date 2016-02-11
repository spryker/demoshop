<?php

namespace Pyz\Zed\Price\Communication\Plugin;

use Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;

/**
 * @method \Pyz\Zed\Price\Communication\PriceCommunicationFactory getFactory()
 * @method \Pyz\Zed\Price\Business\PriceFacade getFacade()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    public function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }

}
