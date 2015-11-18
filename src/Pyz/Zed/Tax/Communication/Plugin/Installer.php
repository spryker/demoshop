<?php

namespace Pyz\Zed\Tax\Communication\Plugin;

use Pyz\Zed\Tax\Business\TaxFacade;
use SprykerFeature\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;

/**
 * @method TaxFacade getFacade()
 */

class Installer extends AbstractInstallerPlugin
{

    public function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }
}