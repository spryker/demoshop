<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Installer\Business;

use Spryker\Zed\Installer\Business\InstallerFacade as SprykerInstallerFacade;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Pyz\Zed\Installer\Business\InstallerBusinessFactory getFactory()
 */
class InstallerFacade extends SprykerInstallerFacade implements InstallerFacadeInterface
{

    /**
     * @return \Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin[]
     */
    public function getDemoDataInstallerPlugins()
    {
        return $this->getFactory()->getDemoDataInstallerPlugins();
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return \Pyz\Zed\Installer\Business\Icecat\IcecatDataInstallerConsole
     */
    public function getIcecatDataConsoleInstaller(OutputInterface $output, MessengerInterface $messenger)
    {
        return $this->getFactory()->getIcecatDataInstaller($output, $messenger);
    }

}
