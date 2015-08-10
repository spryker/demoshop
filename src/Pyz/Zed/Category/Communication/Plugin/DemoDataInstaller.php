<?php

namespace Pyz\Zed\Category\Communication\Plugin;

use Pyz\Zed\Category\Business\CategoryFacade;
use SprykerFeature\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;

/**
 * @method CategoryFacade getFacade()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    public function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }

}
