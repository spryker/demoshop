<?php

namespace Pyz\Zed\Price\Communication\Plugin;

use Pyz\Zed\Price\Business\PriceFacade;
use Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;
use Pyz\Zed\Price\Communication\PriceCommunicationFactory;

/**
 * @method PriceCommunicationFactory getCommunicationFactory()
 * @method PriceFacade getFacade()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    public function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }

}
