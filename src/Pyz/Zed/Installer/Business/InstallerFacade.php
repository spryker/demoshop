<?php

namespace Pyz\Zed\Installer\Business;

use Spryker\Zed\Installer\Business\InstallerFacade as SprykerInstallerFacade;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Pyz\Zed\Installer\Business\InstallerBusinessFactory getFactory()
 */
class InstallerFacade extends SprykerInstallerFacade
{

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return \Pyz\Zed\Installer\Business\Icecat\IcecatDataInstallerConsole
     */
    public function getIcecatDataInstaller(OutputInterface $output)
    {
        return $this->getFactory()->getIcecatDataInstaller($output);
    }


}