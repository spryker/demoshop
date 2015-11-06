<?php

namespace Pyz\Zed\CmsBlock\Communication\Plugin;

use Pyz\Zed\CmsBlock\Business\CmsBlockFacade;
use SprykerFeature\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;

/**
 * @method CmsBlockFacade getFacade()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    public function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }
}
