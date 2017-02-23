<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Updater\Business;

use Psr\Log\LoggerInterface as MessengerInterface;
use Symfony\Component\Console\Output\OutputInterface;

interface UpdaterFacadeInterface
{

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Psr\Log\LoggerInterface $messenger
     *
     * @return \Pyz\Zed\Updater\Business\UpdaterManager
     */
    public function import(OutputInterface $output, MessengerInterface $messenger);

}
