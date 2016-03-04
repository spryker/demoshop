<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Price\Communication\Plugin;

use Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;

/**
 * @method \Spryker\Zed\Price\Communication\PriceCommunicationFactory getFactory()
 * @method \Pyz\Zed\Price\Business\PriceFacade getFacade()
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
