<?php

namespace Pyz\Zed\Price\Communication\Plugin;

use Pyz\Zed\Price\Business\PriceFacade;
use SprykerFeature\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;
use Pyz\Zed\Price\Communication\PriceDependencyContainer;

/**
 * @method PriceDependencyContainer getDependencyContainer()
 * @method PriceFacade getFacade()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    public function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }

}
