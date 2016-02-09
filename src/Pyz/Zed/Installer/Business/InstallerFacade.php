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
     * @param OutputInterface $output
     *
     * @return \Pyz\Zed\Installer\Business\Model\IcecatInstaller
     */
    public function getIcecatDataInstaller(OutputInterface $output)
    {
        return $this->getFactory()->getIcecatDataInstaller($output);
    }

}
