<?php

namespace Pyz\Zed\Installer\Business;

use Pyz\Zed\Installer\Business\Model\IcecatInstaller;
use Spryker\Zed\Installer\Business\InstallerBusinessFactory as SprykerInstallerBusinessFactory;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Pyz\Zed\Installer\InstallerConfig getConfig()
 */
class InstallerBusinessFactory extends SprykerInstallerBusinessFactory
{
    /**
     * @param OutputInterface $output
     *
     * @return \Pyz\Zed\Installer\Business\Model\IcecatInstaller
     */
    public function getIcecatDataInstaller(OutputInterface $output)
    {
        return new IcecatInstaller($output);
    }
}
