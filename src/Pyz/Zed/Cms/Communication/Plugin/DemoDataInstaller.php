<?php

namespace Pyz\Zed\Cms\Communication\Plugin;

use Pyz\Zed\Cms\Communication\CmsDependencyContainer;
use SprykerFeature\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;

/**
 * @method CmsDependencyContainer getDependencyContainer()
 * @method CmsFacade getFacade()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    public function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }

}
