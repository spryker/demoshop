<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Installer\Business;

use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Symfony\Component\Console\Output\OutputInterface;

interface InstallerFacadeInterface extends \Spryker\Zed\Installer\Business\InstallerFacadeInterface
{

    /**
     * @return \Spryker\Zed\Installer\Business\Model\AbstractInstaller[]
     */
    public function getDemoDataInstallerPlugins();

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return \Pyz\Zed\Installer\Business\Icecat\IcecatDataInstallerConsole
     */
    public function getIcecatDataConsoleInstaller(OutputInterface $output, MessengerInterface $messenger);

}
