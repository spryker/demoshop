<?php

namespace Pyz\Zed\Installer\Business;

use Symfony\Component\Console\Output\OutputInterface;

interface InstallerFacadeInterface extends \Spryker\Zed\Installer\Business\InstallerFacadeInterface
{

    /**
     * @return \Spryker\Zed\Installer\Business\Model\AbstractInstaller[]
     */
    public function getDemoDataInstallers();

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return \Pyz\Zed\Installer\Business\Icecat\IcecatDataInstallerConsole
     */
    public function getIcecatDataInstaller(OutputInterface $output);

}
