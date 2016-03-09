<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Shipment\Communication\Plugin;

use Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;

/**
 * @method \Pyz\Zed\Shipment\Business\ShipmentFacade getFacade()
 */
class DemoDataInstallerPlugin extends AbstractInstallerPlugin
{

    /**
     * @return void
     */
    protected function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }

}
