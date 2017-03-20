<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business;

use Psr\Log\LoggerInterface as MessengerInterface;
use Symfony\Component\Console\Output\OutputInterface;

interface ImporterFacadeInterface
{

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Psr\Log\LoggerInterface $messenger
     *
     * @return \Pyz\Zed\Importer\Business\ImporterManager
     */
    public function import(OutputInterface $output, MessengerInterface $messenger);

}
