<?php

namespace Pyz\Zed\ProductOption\Communication\Plugin;

use Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;
use Pyz\Zed\ProductOption\Communication\ProductOptionCommunicationFactory;

/**
 * @method ProductOptionCommunicationFactory getCommunicationFactory()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    public function install()
    {
        $this->getCommunicationFactory()->getInstallerFacade()->installDemoData($this->messenger);
    }

}
