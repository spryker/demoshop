<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Installer;

use Psr\Log\LoggerInterface as MessengerInterface;
use Symfony\Component\Console\Output\OutputInterface;

interface InstallerInterface
{

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Psr\Log\LoggerInterface $messenger
     *
     * @return void
     */
    public function install(OutputInterface $output, MessengerInterface $messenger);

    /**
     * @return bool
     */
    public function isInstalled();

    /**
     * @return string
     */
    public function getTitle();

}
