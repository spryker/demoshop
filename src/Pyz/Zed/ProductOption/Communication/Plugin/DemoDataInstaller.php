<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductOption\Communication\Plugin;

use Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;

/**
 * @method \Pyz\Zed\ProductOption\Communication\ProductOptionCommunicationFactory getFactory()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    /**
     * @return void
     */
    protected function install()
    {
        $this->getFactory()->getInstallerFacade()->installDemoData($this->messenger);
    }

}
