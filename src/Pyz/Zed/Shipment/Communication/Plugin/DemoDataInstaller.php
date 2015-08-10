<?php

namespace Pyz\Zed\Shipment\Communication\Plugin;

use Pyz\Zed\Shipment\Business\ShipmentFacade;
use SprykerFeature\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;

/**
 * @method ShipmentFacade getFacade()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    public function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }
}
