<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Updater\Business;

use Psr\Log\LoggerInterface as MessengerInterface;
use Pyz\Zed\Updater\Business\Console\UpdaterConsole;
use Pyz\Zed\Updater\Business\Factory\InstallerFactory;
use Pyz\Zed\Updater\UpdaterConfig;
use Spryker\Zed\Installer\Business\InstallerBusinessFactory as SprykerInstallerBusinessFactory;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Pyz\Zed\Updater\UpdaterConfig getConfig()
 */
class UpdaterBusinessFactory extends SprykerInstallerBusinessFactory
{

    /**
     * @return \Pyz\Zed\Updater\Business\Factory\InstallerFactory
     */
    protected function createInstallerFactory()
    {
        return new InstallerFactory();
    }

    /**
     * @return \Pyz\Zed\Updater\Business\Installer\InstallerInterface[]
     */
    protected function getInstallerCollection()
    {
        return [
            UpdaterConfig::RESOURCE_PRODUCT_STOCK => $this->createInstallerFactory()->createProductStockInstaller(),
        ];
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Psr\Log\LoggerInterface $messenger
     *
     * @return \Pyz\Zed\Updater\Business\Console\UpdaterConsole
     */
    public function createIcecatUpdater(OutputInterface $output, MessengerInterface $messenger)
    {
        return new UpdaterConsole(
            $output,
            $messenger,
            $this->getInstallerCollection()
        );
    }

}
