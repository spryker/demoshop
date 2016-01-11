<?php

namespace Pyz\Zed\Newsletter\Communication\Plugin;

use Pyz\Zed\Newsletter\Business\NewsletterFacade;
use Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;

/**
 * @method NewsletterFacade getFacade()
 */
class Installer extends AbstractInstallerPlugin
{

    /**
     * @return void
     */
    public function install()
    {
        $this->getFacade()->install();
    }

}
