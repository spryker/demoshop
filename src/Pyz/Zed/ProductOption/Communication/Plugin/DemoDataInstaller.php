<?php

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
    public function install()
    {
        $this->getFactory()->getInstallerFacade()->installDemoData($this->messenger);
    }

}
